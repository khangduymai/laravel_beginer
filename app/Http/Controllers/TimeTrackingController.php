<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TimeTracking;
use Illuminate\Validation\ValidationException;

class TimeTrackingController extends Controller
{
    public function showCheckin() {
        return view('time_tracking.checkin');
    }

    public function checkin(Request $request) {
        $user = $this->getUser($request);

        if (empty($user)) {
            return $this->sendFailedLoginResponse($request);
        }

        $timeTracking = $this->startTimeTracking($user);

        return view('time_tracking.welcome', ['user' => $user, 'timeTracking' => $timeTracking]);
    }

    private function startTimeTracking(User $user): TimeTracking 
    {
        $now = new \DateTime('now');
        $epoch = $now->format('U');

        $timeTracking = new TimeTracking(['time_in' => $epoch]);

        $user->timeTrackings()->save($timeTracking);

        return $timeTracking;
    }

    private function getUser(Request $request): ?User
    {
        $user = null;
        $userQuery = User::with('alternativeId');

        if ($request->input('email')) {
            $userQuery->where('email', $request->input('email'));

            $this->field = 'email';
        } elseif ($request->input('phone')) {
            $userQuery->where('phone', $request->input('phone'));

            $this->field = 'phone';
        } elseif ($request->input('unique-id')) {
            $userQuery->whereHas('alternativeId', 
                        function($query) use ($request) {
                            $query->where('unique_id', $request->input('unique-id')); 
                        });
   
            $this->field = 'unique-id';
        } else {
            $this->field = 'email';
            return null;
        }

        $user = $userQuery->first();

        return empty($user) ? null : $user;
    } 

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->field => [trans('auth.failed')],
        ]);
    }
}

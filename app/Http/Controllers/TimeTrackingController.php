<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TimeTracking;
use Illuminate\Validation\ValidationException;

class TimeTrackingController extends Controller
{
    public function showCheckIn() {
        return view('time_tracking.check_in');
    }

    public function checkIn(Request $request) {
        $user = $this->getUser($request);

        if (empty($user)) {
            return $this->sendFailedLoginResponse($request);
        }

        $timeTracking = $this->startTimeTracking($user);

        return view('time_tracking.welcome', ['user' => $user, 'timeTracking' => $timeTracking]);
    }

    public function showCheckOut(Request $request) {
       $users = User::with('timeTrackings')
                    ->whereHas('timeTrackings', function($query) {
                        $query->whereNull('time_out');
                    })
                    ->get();

       return view('time_tracking.check_out', ['users' => $users]);
    }

    public function checkOut(int $userId) {
        $user = User::with('timeTrackings')
                    ->whereHas('timeTrackings', function($query) {
                        $query->whereNull('time_out');
                    })
                    ->find($userId);

        foreach($user->timeTrackings as $timeTracking) {
            $now = new \DateTime('now');
            $epoch = $now->format('U');
            $timeTracking->time_out = $epoch;
            $timeTracking->save();
        }

        return view('time_tracking.check_in');
    }

    private function startTimeTracking(User $user): TimeTracking 
    {
        //dd($user->timeTrackings()->whereNull('time_out')->exists());

        $isTimeIn = $user->timeTrackings()->whereNull('time_out')->exists();

        if($isTimeIn){
            $this->sendCustomValidationErrors(['You already login']);
        }

        // Get epoch timestamp
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
            $this->sendCustomValidationErrors(['Please provide email/phone/unique id.']);
        }

        $user = $userQuery->first();

        return empty($user) ? null : $user;
    } 

    private function sendCustomValidationErrors(array $messages) {
        throw ValidationException::withMessages($messages);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->field => [trans('auth.failed')],
        ]);
    }
}

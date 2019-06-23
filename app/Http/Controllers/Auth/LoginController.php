<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Overwrite trait method login in AuthenticatesUsers
     */
    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (
            method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)
        ) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($request->input('email')) {
            $user = User::where('email', $request->input('email'))->first();
            
            $field = 'email';
        } elseif ($request->input('phone')) {
            $user = User::where('phone', $request->input('phone'))->first();

            $field = 'phone';
        } elseif ($request->input('unique-id')) {
            $user = User::whereHas('alternativeId', 
                        function($query) use ($request) {
                            $query->where('unique_id', $request->input('unique-id')); 
                        })
                        ->first();

            $field = 'unique-id';
        }       

        // Failed login
        if (empty($user)) {
            $this->incrementLoginAttempts($request);
            return $this->sendFailedLoginResponse($request, $field);
        }

        // Success login
        Auth::login($user);
        return $this->sendLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request, string $field)
    {
        throw ValidationException::withMessages([
            $field => [trans('auth.failed')],
        ]);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            'email' => 'required_without_all:phone,unique-id|nullable|string|email',
            'phone' => 'required_without_all:email,unique-id|nullable|string|max:20',
            'unique-id' => 'required_without_all:phone,email|nullable|string|max:10',
        ]);
    }
}

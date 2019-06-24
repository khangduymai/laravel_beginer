<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\AlternativeId;
use App\Role;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Http\Request;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name' => ['required', 'string', 'max:255'],
            'last-name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
    }

    public function showRegistrationForm()
    {
        $roles = Role::where('description', '<>', 'admin')->get();

        return view('auth.register', ['roles' => $roles]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //Create User
        $user = User::create([
            'email' => $data['email'],
            'first_name' => $data['first-name'],
            'last_name' => $data['last-name'],
            'phone' => $data['phone']
        ]);

        // Attach role for user
        $roleId = Crypt::decryptString($data['role-select']);

        $role = Role::find($roleId);

        $user->roles()->attach($role->id);

        // Create unique id based on user id
        $uniqueId = 'MS' . str_pad($user->id, 8, '0', STR_PAD_LEFT);

        AlternativeId::create([
            'unique_id' => $uniqueId,
            'user_id' => $user->id
        ]);

        return $user;
    }

    public function register(Request $request)
    {
        if (!$this->validateRole($request->all())) {
            return redirect()->back()->withErrors(['You shall not pass!!!']);
        }

        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return view('time_tracking.check_in');
    }

    private function validateRole(array $data): bool
    {
        $roleId = Crypt::decryptString($data['role-select']);

        $role = Role::find($roleId);

        return strtolower($role->description) !== 'admin';
    }
}

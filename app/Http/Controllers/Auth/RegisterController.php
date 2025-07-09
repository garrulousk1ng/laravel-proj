<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $this->middleware(function ($request, $next) {
            // Allow if no users exist (first registration)
            if (User::count() === 0) {
                return $next($request);
            }

            // Allow if current user is authenticated AND is admin
            if (Auth::check() && Auth::user()->role && Auth::user()->role->name === 'admin') {
                return $next($request);
            }

            // Otherwise, block access to registration
            abort(403, 'Registration is disabled.');
        });
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $isAdmin = Session::pull('admin_register') === true;
        $isFirstUser = User::count() === 0;

        $roleId = $isAdmin
            ? Role::where('name', 'admin')->value('id') ?? 1
            : Role::where('name', 'user')->value('id') ?? 2;


        \Log::info("Registering user: {$data['email']} | FirstUser: " . ($isFirstUser ? 'Yes' : 'No') . " | isAdminRequest: " . ($isAdmin ? 'Yes' : 'No') . " | Role ID: $roleId");

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'email_verified_at' => now(),
            'password' => Hash::make($data['password']),
            'role_id' => $roleId,
        ]);
    }

    public function showRegistrationForm()
    {
        // Check if the special admin link was used
        if (request()->query('admin_register') === '1') {
            Session::put('admin_register', true);
        }

        return view('auth.register');
    }
}

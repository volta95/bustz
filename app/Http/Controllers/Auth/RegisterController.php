<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required', 'string', 'min:3', 'max:255'],
            'lname' => ['required', 'string', 'min:3', 'max:255'],
            'phone_number' => ['required', 'string', 'max:12', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     *
     * @return \App\User
     */
    protected function create(array $data)
    {
        $company_id = \Cookie::get('company_id');
        $user_count = User::all()->count();
        if ($user_count == 0) {
            return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'gender' => $data['gender'],
            'role_id' => 1,
            'password' => Hash::make($data['password']),
        ]);
        } elseif (isset($company_id)) {
            $User = User::create([
                'fname' => $data['fname'],
                'lname' => $data['lname'],
                'phone_number' => $data['phone_number'],
                'email' => $data['email'],
                'gender' => $data['gender'],
                'role_id' => 2,
                'password' => Hash::make($data['password']),
            ]);

            Staff::create([
            'user_id' => $User->id,
            'company_id' => $company_id,
            ]);

            return $User;
        } else {
            return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone_number' => $data['phone_number'],
            'email' => $data['email'],
            'role_id' => 3,
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);
        }
    }
}

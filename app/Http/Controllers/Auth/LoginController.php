<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    use AuthenticatesUsers {
        logout as performLogout;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo(){

        // User role
        //$role = Auth::user()->role_id;

        // Check user role
        //switch ($role) {
           // case '1':
                  //  return 'admin/home';
                //break;
           // case '2':
                  //  return 'busowner/home';
                //break;
            //case '3':
                    return '/home';
                // break;
           // default:
                    //return '/login';
               // break;
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function logout(Request $request)
{
    $this->performLogout($request);
    return redirect('/login');
}
}

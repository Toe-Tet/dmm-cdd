<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\BaseController;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends BaseController
{
    use AuthenticatesUsers;

    protected $redirectTo = '/dashboard';

    // public function getLogin(){
    //     return view('auth.login');
    // }

    // public function postLogin(Request $request){

    //     $this->validateLogin($request);

    //     // If the class is using the ThrottlesLogins trait, we can automatically throttle
    //     // the login attempts for this application. We'll key this by the username and
    //     // the IP address of the client making these requests into this application.
    //     if ($this->hasTooManyLoginAttempts($request)) {
    //         $this->fireLockoutEvent($request);

    //         return $this->sendLockoutResponse($request);
    //     }

    //     if ($this->loginAttempt($request)) {
    //         return $this->loginResponse($this->loginAttempt($request));
    //     }

    //     // If the login attempt was unsuccessful we will increment the number of attempts
    //     // to login and redirect the user back to the login form. Of course, when this
    //     // user surpasses their maximum number of attempts they will get locked out.
    //     $this->incrementLoginAttempts($request);
    //     error_alert('Invalid Login Credentials');
    //     return redirect()->route('admin.login.get');
    // }

    // public function loginAttempt($request){
    //     $user = User::whereEmail($request->email)->first();
    //     if($user){
    //         if(Hash::check($request->password, $user->password)) {
    //             $this->clearLoginAttempts($request);
    //             return $user;
    //         }
    //     }
    //     return false;
    // }

    // public function loginResponse($user){
    //     auth('admin')->login($user);
    //     success_alert('Welcome to Aung Si');
    //     return redirect($this->redirectTo);
    // }

    // public function logout(Request $request){
    //     $this->guard()->logout();

    //     $request->session()->invalidate();

    //     return redirect()->route('admin.login.get');
    // }
}

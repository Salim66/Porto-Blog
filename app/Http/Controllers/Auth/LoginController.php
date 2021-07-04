<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


        /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'     => ['required', 'email', 'string'],
            'password'  => 'required',
        ]);

        // Get login info
        $email    = $request->email;
        $password = $request->password;

        //verify email
        $verify_email = User::where('email', $email)->first();
        //password varified
        $check_password = password_verify($password, $verify_email->password);

        // Checked email and password is not match
        if($check_password == false){
            return  redirect()->back()->with('warning', 'Email and password did not match!');
            die();
        }

        // Check account varified or not
        if($verify_email->status == false){
            return  redirect()->back()->with('warning', 'Sorry! you do not verified yet!');
            die();
        }

        // Check account is trash
        if($verify_email->trash == true){
            return  redirect()->back()->with('error', 'Your account has been suspended!');
            die();
        }

        // if admin panel access unauthorised person
        if ($verify_email->user_type == 'User') {
            return redirect()->back()->with('warning', 'Sorry! you do not permission this panel! and do not try to be oversmart!');
            die();
        }

        //if email and password is match then allow to admin dashboard
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            // return redirect()->route('login')->with('success', 'You successfully login ): ');
            return redirect()->route('admin.dashboard')->with('success', 'Your are successfully login ): ');
        }
    }


    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

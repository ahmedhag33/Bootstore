<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admin for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    public function getlogin()
    {
        return view('adminpanel.login');
    }
    /**
     * Show the application loginprocess.
     *
     * @return \Illuminate\Http\Response
     */
    public function postlogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        $attempt = ['email' => $request->email, 'password' => $request->password];
        if (auth()->guard('admin')->attempt($attempt)) {
            return redirect()->route('adminpanel.main');
        } else {
            return back()->with('error', 'your username and password are wrong.');
        }
        return back()->withInput($request->only('email'));
    }
    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        auth()->guard('admin')->logout();
        Session::flush();
        Session::put('success', 'You are logout successfully');
        return redirect(route('adminpanel.login'));
    }
}

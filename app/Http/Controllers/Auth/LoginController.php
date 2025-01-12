<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;  

class LoginController extends Controller
{
    use AuthenticatesUsers; 

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Override authenticated method to flash login success message.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return \Illuminate\Http\Response
     */
    protected function authenticated($request, $user)
    {
        session()->flash('status', 'Berhasil login!');
        return redirect()->intended($this->redirectPath());
    }

    /**
     * Handle logout functionality.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout(); 
        // Redirect ke halaman login dengan status logout berhasil
        return redirect()->route('login')->with('status', 'Successfully logged out!');
    }
}

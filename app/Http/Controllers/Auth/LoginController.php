<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use \Illuminate\Foundation\Auth\AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // هذا معناه بعد نجاح تسجيل الدخول
   protected function authenticated(Request $request, $user)
{
    if (Auth::check()) {
        return redirect()->intended('/home');
    }

    Auth::logout();
    return redirect('/login')->withErrors(['email' => 'Unauthorized login attempt.']);
}
}

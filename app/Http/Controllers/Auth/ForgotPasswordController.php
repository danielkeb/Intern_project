<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ForgotPasswordController extends Controller
{

    public function sendResetLinkEmail(Request $request)
{
    $this->validate($request, ['email' => 'required|email']);

    $response = Password::sendResetLink(
        $request->only('email')
    );
    

    return $response == Password::RESET_LINK_SENT
        ? back()->with('status', trans($response))
        : back()->withErrors(['email' => trans($response)]);
}

public function showResetForm(Request $request, $token = null)
{
    return view('auth.passwords.reset')->with(
        ['token' => $token, 'email' => $request->email]
    );
}


public function reset(Request $request)
{
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|confirmed|min:8',
    ]);

    $response = $this->broker()->reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $this->resetPassword($user, $password);
        }
    );

    return $response == Password::PASSWORD_RESET
        ? redirect()->route('login')->with('status', trans($response))
        : back()->withErrors(['email' => trans($response)]);
}


public function showLinkRequestForm()
{
    return view('auth.forgot-password');
}
}

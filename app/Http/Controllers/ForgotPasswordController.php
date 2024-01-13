<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ForgotPasswordController extends Controller
{    
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
    
        // Fetch the user's email from the database
        $user = User::where('email', $request->email)->first();
    
        if (!$user) {
            // Handle the case when the email is not found in the database
            throw ValidationException::withMessages([
                'email' => ['The provided email address is not registered.'],
            ]);
        }
    
        $response = $this->broker()->sendResetLink(
            ['email' => $user->email] // Use the fetched email
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
    return view('auth.passwords.email');
}
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $maxAttempts = 5; // Maximum number of attempts to allow
    protected $decayMinutes = 1; // The number of minutes to throttle for

    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($request->only('email', 'password'))) {
            // Authentication passed, redirect to the dashboard
            return redirect()->intended('dashboard');
        }

        // If the login attempt was unsuccessful, increment the number of attempts to throttle the user
        $this->incrementLoginAttempts($request);

        // If too many login attempts, throttle the user
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        // Authentication failed, redirect back with input
        return redirect()->back()->withInput($request->only('email'));
    }

    // Get the login username to be used by the controller.
    public function username()
    {
        return 'email';
    }
}

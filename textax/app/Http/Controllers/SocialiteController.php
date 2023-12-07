<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SocialiteController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     *
     * @return RedirectResponse
     */
    public function redirectToProvider(): RedirectResponse
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     *
     * @return RedirectResponse
     */
    public function handleProviderCallback(): RedirectResponse
    {
        $user = Socialite::driver('google')->user();

        // Here you should implement your logic to handle the user information
        // For example, you can check if the user exists in your database and create a new user if not
        $localUser = User::where('email', $user->getEmail())->first();

        if (!$localUser) {
            $localUser = User::create([
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'email_verified_at' => now(),
                'password' => bcrypt('password')
            ]);
        }

        // Then, you can log the user in and redirect them to a specific page
        Auth::login($localUser, true);

        return redirect('/home');
    }
}

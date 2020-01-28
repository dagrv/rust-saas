<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     * @var string
     */
     protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // --------------GITHUB------------------

    /**
     * Redirect the user to the GitHub authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToGithubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     * @return \Illuminate\Http\Response
     */
    public function handleGithubProviderCallback()
    {
        $user = Socialite::driver('github')->user();
        return $this->oauth_login($user, 'github');
    }

    // --------------GOOGLE------------------

    // Abraham:
    // Google Submission : 27/01/2020 (takes up to 4/5 business days)

    /**
     * Redirect the user to the Google authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
        return $this->oauth_login($user, 'google');
    }

    // --------------FB------------------
    /**
     * Redirect the user to the FB authentication page.
     * @return \Illuminate\Http\Response
     */
    public function redirectToFacebookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     * @return \Illuminate\Http\Response
     */
    public function handleFacebookProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();
        return $this->oauth_login($user, 'facebook');
    }

    // ------------MAIN HANDLER--------------

    public function oauth_login($user, $type)
    {
        // Checking if user already exists, in case he doesn't remember with which OAuth service he logged in
        $userExists = User::where('email', '=', $user->email)->first();

        // Check if the user does not exists, create the user
        if (!$userExists) {
            $newUser = User::create([
                'name' => $user->name ?? $user->nickname,           // For Abraham: A github user can have a name to blank, if so we fetch his nickname (username so to speak)
                'email' => $user->email,
                'password' => Hash::make(md5(uniqid() . now())),
                'trial_ends_at' => now()->addDays(13),              // 13 Days Trial Period
                'email_verified_at' => now(),
                'auth_type' => $type
            ]);

        Auth::login($newUser);
        } else {
            if ($userExists->auth_type != $type) {
                if ($userExists->auth_type == 'email') {
                    $message = 'This email is already linked to an account. Please login or reset your password';
                } else {
                    $message =  'This email is already been registered with '. ucfirst($type) .', Please login with ' . ucfirst($type) . '';
                }
                return redirect('login')->with(['alert' => $message, 'alert_type' => 'error']);
            }
            Auth::login($userExists);                               // Just log them in if they exists, but we need to verify Auth type first
        }

        return redirect('dashboard');
    }
}
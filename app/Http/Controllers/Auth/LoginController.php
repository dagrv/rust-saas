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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGithubProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGithubProviderCallback()
    {
        $user = Socialite::driver('github')->user();


        // Check if user already exists, in case he doesn't remember with which OAuth service he logged in
        $userExists = User::where('email', '=', $user->email)->first();

        // Check if the user does not exists, create the user
        if (!$userExists) {
            $newUser = User::create([
                'name' => $user->name ?? $user->nickname,           // For Abraham: A github user can have a name to blank, if so we fetch his nickname (username so to speak)
                'email' => $user->email,
                'password' => Hash::make(md5(uniqid() . now())),
                'trial_ends_at' => now()->addDays(12),              // 12 Days Trial Period
                'email_verified_at' => now(),
                'auth_type' => 'github'
            ]);

        Auth::login($newUser);
        } else {
            if ($userExists->auth_type != 'github') {
                if ($userExists->auth_type == 'email') {
                    $message = 'This email is already linked to an account. Please login or reset your password';
                } else {
                    $message =  'This email is already been registered with Github, Please login with Github';
                }
                return redirect('login')->with(['alert' => $message, 'alert_type' => 'error']);
            }
            Auth::login($userExists);                               // Just log them in if they exists, but we need to verify Auth type first
        }

        return redirect('dashboard');
    }
}
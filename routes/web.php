<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function () {
    return view('home');
});

// Logout
Route::get('logout', function(){
    \Auth::logout();
    return redirect('/');
});

// Auth Middleware
Route::group(['middleware' => ['auth', 'verified']], function() {
    
    // Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    // Settings Redirections
    Route::redirect('settings', 'settings/profile')->name('settings');
    
    // Profile
    Route::get('settings/profile', 'DashboardController@profile')->name('profile');
    Route::post('settings/profile', 'DashboardController@profile_save')->name('profile.save'); // Submission

    // Settings -> Security
    Route::get('settings/security', 'DashboardController@security')->name('security');
    Route::post('settings/security', 'DashboardController@security_save')->name('security.save');

    // Settings -> Billing
    Route::get('settings/billing', 'DashboardController@billing')->name('billing');
    Route::post('settings/billing', 'DashboardController@billing_save')->name('billing.save');
});

// Auth & Email verification on SignUp
Auth::routes(['verify' => true]);

// Home (2)
Route::get('/home', 'HomeController@index')->name('home');
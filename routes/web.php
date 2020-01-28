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
Route::group(['middleware' => ['auth', 'verified', 'subscriber']], function() {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');                                                  // Dashboard

    Route::get('courses', 'CourseController@courses')->name('courses');                                                       // Courses


    Route::redirect('settings', 'settings/profile')->name('settings');                                                        // Settings Redirections
    
    // Profile
    Route::get('settings/profile', 'DashboardController@profile')->name('profile');
    Route::post('settings/profile', 'DashboardController@profile_save')->name('profile.save');                                // Submission

    // Settings -> Security
    Route::get('settings/security', 'DashboardController@security')->name('security');
    Route::post('settings/security', 'DashboardController@security_save')->name('security.save');

    // Billing 
    Route::post('settings/billing/switch_plan', 'BillingController@switch_plan')->name('billing.switch_plan');

    // Invoices
    Route::get('settings/invoices', 'DashboardController@invoices')->name('invoices');           // Invoices
    Route::get('settings/invoices/download/{invoice}', 'DashboardController@invoices_download')->name('invoices.download');   // Invoices download

    // Plan cancellation
    Route::get('settings/billing/cancel', 'BillingController@cancel')->name('cancel');
    Route::get('settings/billing/resume', 'BillingController@resume')->name('resume');                                        // Resume Plan

    // Support Inquiries 
    Route::view('support', 'support')->name('support');
    Route::post('support', 'SupportController@send')->name('support.send');                                                   // Send Mail Support

    // Annoucement (on each new event) via Notification on Dashboard 
    Route::get('announcements', 'AnnouncementController@index')->name('announcements'); 
    Route::get('announcements/unread', 'AnnouncementController@unread')->name('announcements.unread');
    Route::get('announcement/{id}', 'AnnouncementController@announcement')->name('announcement');
});

Route::group(['middleware' => ['auth', 'verified']], function() {
    // Settings -> Billing
    Route::get('settings/billing', 'BillingController@billing')->name('billing');
    Route::post('settings/billing', 'BillingController@billing_save')->name('billing.save');
});

// Auth & Email verification on SignUp
Auth::routes(['verify' => true]);

// OAuth - GitHub
Route::get('login/github', 'Auth\LoginController@redirectToGithubProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleGithubProviderCallback');

// OAuth - Google
Route::get('login/google', 'Auth\LoginController@redirectToGoogleProvider');
Route::get('login/google/callback', 'Auth\LoginController@handleGoogleProviderCallback');

// OAuth - Facebook
Route::get('login/facebook', 'Auth\LoginController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleFacebookProviderCallback');

// Home (2)
Route::get('/home', 'HomeController@index')->name('home');

// Privacy Policy & Terms and Conditions (via Dynamic routes)
Route::get('p/{slug}', 'PageController@page')->name('page');
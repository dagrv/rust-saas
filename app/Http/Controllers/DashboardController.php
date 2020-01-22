<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request)
    {
        return view('dashboard');
    }


    // ---- Profile ----
    public function profile(Request $request)
    {
        return view('settings.profile');
    }
    public function profile_save(Request $request)
    {
        echo 'Profile Saved !';
    }


    // ---- Security ----
    public function security(Request $request)
    {
        return view('settings.security');
    }
    public function security_save(Request $request)
    {
        echo 'Security !';
    }


    // ---- Billing ----
    public function billing(Request $request)
    {
        return view('settings.billing');
    }
    public function billing_save(Request $request)
    {
        echo 'Billing !';
    }
}
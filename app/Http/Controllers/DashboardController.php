<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

// Panoptikum

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
        $user = auth()->user();

        $request->validate([
            'name'  => 'required|min:3|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ]
        ]);

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpeg,bmp,png,jpg,gif,tiff'
            ]);
            
            $user->name = $request->name;
            $user->email = $request->email;

            $photo = $request->photo;
            $filename = Str::slug($request->name) . '-' . uniqid() . '.' . $photo->extension();
            $photo->storeAs('public/images/user', $filename);

            $user->photo = $filename;
        }

        $user->save();

        return back()->with(['alert' => 'Profil Successfully Updated !', 'alert_type' => 'success']);
    }


    // ---- Security ----
    public function security(Request $request)
    {
        return view('settings.security');
    }

    public function security_save(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'password' => 'required|confirmed',
        ]);

        $user->password = Hash::make($request->password);
        $user->save();

        return back()->with(['alert' => 'Your Password Was Successfully Updated !', 'alert_type' => 'success']);
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
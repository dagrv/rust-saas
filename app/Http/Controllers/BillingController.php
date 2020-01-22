<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    
    public function billing(Request $request)
    {
        return view('settings.billing');
    }

    // Submission
    public function billing_save(Request $request)
    {
        $user = auth()->user();
        
        try {
            $user->newSubscription('default', 'basic')->create($request->payment_method);
        } catch(Exception $e) {
            return back()->with(['alert' => 'Something went wrong while updating your Credit Card !', 'alert_type' => 'error']);
        }

        return back()->with(['alert' => 'Successfully Updated your Credit Card !', 'alert_type' => 'success']);
    }
}
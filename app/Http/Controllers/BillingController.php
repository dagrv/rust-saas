<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Plan;
use Exception;

class BillingController extends Controller
{
    public function billing (Request $request) {
        $plans = Plan::get();
        return view('settings.billing', compact('plans'));
    }

    public function billing_save (Request $request){
        $user = auth()->user();

        try {
            if ($user->subscribed('main')) {
                $user->updateDefaultPaymentMethod($request->payment_method); // update their credit card
            } else {
                $plan = Plan::where('name', '=', $request->plan)->first();
                $user->plan_id = $plan->id;
                $user->save();
                $user->newSubscription('main', 'basic')->create($request->payment_method);
            }
        } catch(Exception $e){
            return back()->with(['alert' => 'Something went wrong submitting your billing info', 'alert_type' => 'error']);
        }

        return back()->with(['alert' => 'Successfully updated your billing info', 'alert_type' => 'success']);
    }

    public function switch_plan(Request $request)
    {
        $plan = Plan::where('name', '=', $request->plan)->first();
        $user = auth()->user();

        try {
            $user->subscription('main')->swap($request->plan);
            $user->plan_id = $plan->id;
            $user->save();
        } catch(Exception $e) {
            return back()->with(['alert' => 'Something went wrong while switching plans', 'alert_type' => 'error']);
        }

        return back()->with(['alert' => 'Successfully updated your billing info', 'alert_type' => 'success']);
    }
}

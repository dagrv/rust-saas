<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{
    public function send(Request $request)
    {
        $user = auth()->user();

        $msg = $request->message;

        $subject = $request->subject;


        if ($msg == "" || $subject == "") {
            return back()->with(['alert' => 'We become aware of the void as we fill it.', 'alert_type' => 'error'])
                         ->withInput($request->all());
        }


        Mail::send('mail.support', compact('user', 'msg'), function($mail) use ($user, $subject) {
            $mail->from($user->email, $user->name);
            $mail->to('support@rust-software.com')->subject('New Support Inquiry - ' . $subject);
        });

        return back()->with(['alert' => 'Your Message Was Successfully Sent ! Please wait 24 / 48 hours for a response.', 'alert_type' => 'success']);
    }
}

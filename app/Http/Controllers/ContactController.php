<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Mail::raw(
            "Name: {$request->name}\n" .
            "Email: {$request->email}\n\n" .
            "Message:\n{$request->message}",

            function ($mail) use ($request) {
                $mail->to('minahil7776@gmail.com')
                     ->subject($request->subject)
                     ->replyTo($request->email, $request->name);
            }
        );

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
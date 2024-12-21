<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;


use Illuminate\Http\Request;

class FormContact extends Controller
{
    public function showForm()
    {
        return view('contact'); 
    }

    public function send(Request $request)
    {
        // Validate the incoming data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'userMessage' => 'required|string',
        ]);
    
        // Prepare the data to be sent in the email
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'userMessage' => $request->userMessage,
        ];
    
        // Send the email
        Mail::to('admin@example.com')->send(new ContactFormMail($data));
    
        
        return back()->with('success', 'Your message has been sent successfully!'); 
        // return view('contact')->with('success', 'Your message has been sent successfully!');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Illuminate\Support\Facades\Auth;
class ContactController extends Controller
{

public function getEmails()
{
    $inbox_id = '3343806'; 
    $apiToken = 'c9536bdfe6f0efe4b7cd8bd8d6d5dea7'; 
    $accountId = "2153624"; 

    $response = Http::withHeaders([
        'Authorization' => 'Bearer ' . $apiToken,
    ])->get("https://mailtrap.io/api/accounts/{$accountId}/inboxes/{$inbox_id}/messages");

 
    if ($response->successful()) {
        $emails = $response->json();

        return view('emails.contact-form', compact('emails'));
    }

    return view('emails.contact-form', ['error' => 'Failed to retrieve emails']);
}
}

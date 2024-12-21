<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $userMessage;

    /**
     * Create a new message instance.
     */
    public function __construct($data)
    {
        $this->name = $data['name'];
        $this->email = $data['email'];
        $this->userMessage = $data['userMessage'];
    }

    /**
     * Build the message.
     */
    public function build()
{
    return $this->subject($this->userMessage)
                ->view('emails.contact-email')  
                ->with([
                    'name' => $this->name,
                    'email' => $this->email,
                    'userMessage' => $this->userMessage,
                ]);
}





}

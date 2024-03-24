<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendUserNotifcation extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct($text)
    {
        $this->text = $text;
    }

    /**
     * Get the message envelope.
     */

    public function build()
    {
        $data = $this->text;
        return $this->markdown('email.sendUserNotification',compact('data'));
//        return $this->subject('Verify Email')
//            ->view('email.verify_email')->with('data', $this->data);;
    }
}

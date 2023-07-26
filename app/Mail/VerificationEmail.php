<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $user;
    public $verificationLink;

    public function __construct($user, string $verificationLink)
    {
        $this->user = $user;
        $this->verificationLink = $verificationLink;
    }


    public function build()
    {
        return $this->markdown('emails.verification')
                    ->subject('Verify Your Email Address');
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserLoggedInNotification extends Mailable
{
    public function build()
    {
        return $this->subject('User Logged In Notification')
            ->view('mail.loginmail');
    }
}

<?php


use Illuminate\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;

class UserLoggedInNotification extends Mailable
{
    public function build()
    {
        return $this->subject('User Logged In Notification')
            ->view('emails.userLoggedIn');
    }
}
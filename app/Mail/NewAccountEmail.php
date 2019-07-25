<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Auth;
use App\User;

class NewAccountEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($new_user_email, $new_user_password)
    {
        $this->email = $new_user_email;
        $this->password = $new_user_password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $sender = Auth::user();
        return $this->from($sender->email)->view('emailku');
    }
}

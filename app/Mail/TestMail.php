<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailMessage;

    public function __construct($emailMessage)
    {
        $this->emailMessage = $emailMessage;
    }

    public function build()
    {
        return $this->view('mail.test');
    }
}


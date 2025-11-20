<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TestMail extends Mailable implements ShouldQueue
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


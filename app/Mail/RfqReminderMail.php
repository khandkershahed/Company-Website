<?php

namespace App\Mail;

use App\Models\Admin\Rfq;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class RfqReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rfq;

    /**
     * Create a new message instance.
     */
    public function __construct(Rfq $rfq)
    {
        $this->rfq = $rfq;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject(' Reminder: Quotation send Pending for RFQ - ' . $this->rfq->rfq_code)
            ->view('mail.rfq_reminder')
            ->with([
                'rfq' => $this->rfq,
            ]);
    }
}

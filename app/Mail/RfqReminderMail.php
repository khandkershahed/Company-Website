<?php

namespace App\Mail;

use App\Models\Admin\Rfq;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RfqReminderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $rfq;
    public $hours;

    /**
     * Create a new message instance.
     */
    public function __construct(Rfq $rfq, int $hours)
    {
        $this->rfq = $rfq;
        $this->hours = $hours;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject("⏰ RFQ Reminder ({$this->hours}h): Pending Quotation for RFQ - {$this->rfq->rfq_code}")
            ->view('mail.rfq_reminder')
            ->with([
                'rfq'   => $this->rfq,
                'hours' => $this->hours,
            ]);
    }
}

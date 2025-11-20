<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RfqAssigned extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address('support@ngenit.com', 'NGEN-Business'),
            subject: "A RFQ#{$this->data['rfq_code']} has been assigned to you."
        );
    }

    /**
     * Get the content definition for the message.
     */
    public function content()
    {
        return new Content(
            view: 'mail.rfqAssign_mail',
            with: ['data' => $this->data],
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [];
    }


}

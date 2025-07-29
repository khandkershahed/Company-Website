<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RFQConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $data;
    public string $rfq_code;

    public function __construct(array $data, string $rfq_code)
    {
        $this->data = $data;
        $this->rfq_code = $rfq_code;
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */

     public function build()
    {
        return $this->from('support@ngenit.com', 'NGEN-Business')
                    ->view('mail.rfqNotificationConfirmMail', ['data' => $this->data])
                    ->subject("[New Customer] - A {$this->rfq_code} has been received and needs confirmation.");
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: "[New Customer] - A {$this->rfq_code} has been received and needs confirmation.",
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            // view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}

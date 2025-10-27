<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DealNotificationAdminMail extends Mailable
{
    use Queueable, SerializesModels;
    public array $data;
    public string $deal_creator;
    /**
     * Create a new message instance.
     */
    public function __construct(array $data, string $deal_creator)
    {
        $this->data = $data;
        $this->deal_creator = $deal_creator;
    }

     public function build()
    {
        return $this->from('support@ngenit.com', 'NGEN-Business')
                    ->view('mail.dealNotificationAdminMail', ['data' => $this->data])
                    ->subject("{$this->deal_creator} has been created a deal.");
    }

    public function envelope()
    {
        return new Envelope(
            subject: "{$this->deal_creator} has been created a deal.",
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

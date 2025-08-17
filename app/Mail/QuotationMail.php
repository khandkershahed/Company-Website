<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuotationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    protected $pdfAttachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(array $data, $pdfAttachment = null)
    {
        $this->data = $data;
        $this->pdfAttachment = $pdfAttachment;
    }

    public function build()
    {
        $email = $this->from('support@ngenit.com', 'NGEN-Sales')
                      ->view('mail.quotationMail', ['data' => $this->data])
                      ->subject('A Quotation (RFQ#' . $this->data['rfq_code'] . ') has been received from NGenIT.');

        if ($this->pdfAttachment) {
            $email->attachData($this->pdfAttachment, "Quotation-Ngenit-{$this->data['rfq_code']}.pdf");
        }

        return $email;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'A Quotation (RFQ#' . $this->data['rfq_code'] . ') has been received from NGenIT.',
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
        // return [];
    }
}

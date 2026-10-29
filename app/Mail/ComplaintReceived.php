<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComplaintReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $claim)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nuevo ' . strtolower($this->claim['claim_type']) . ' de libro de reclamaciones - ' . $this->claim['code'],
            replyTo: [new Address($this->claim['email'], $this->claim['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(view: 'emails.complaint-received');
    }

    public function attachments(): array
    {
        return [];
    }
}

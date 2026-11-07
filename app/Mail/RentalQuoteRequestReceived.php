<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RentalQuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $quote)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva consulta de alquiler: ' . $this->quote['alquiler_nombre'],
            replyTo: [new Address($this->quote['email'], $this->quote['nombre'])],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.rental-quote-request-received',
            with: ['rentalImagePath' => $this->getRentalImagePath()],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    private function getRentalImagePath(): ?string
    {
        $image = $this->quote['alquiler_imagen'] ?? null;
        $imagePath = is_string($image) && $image !== ''
            ? realpath(public_path($image))
            : false;

        if (! $imagePath || ! is_file($imagePath)) {
            return null;
        }

        return $imagePath;
    }
}

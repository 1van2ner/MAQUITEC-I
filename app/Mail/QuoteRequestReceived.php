<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class QuoteRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $quote)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva solicitud de cotización: ' . $this->quote['product_name'],
            replyTo: [new Address($this->quote['email'], $this->quote['name'])],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.quote-request-received',
            with: ['productImagePath' => $this->getProductImagePath()],
        );
    }

    public function attachments(): array
    {
        return [];
    }

    private function getProductImagePath(): ?string
    {
        $image = $this->quote['product_image'] ?? null;
        $publicDirectory = realpath(public_path());
        $imagePath = is_string($image) && $image !== ''
            ? realpath(public_path($image))
            : false;

        if (! $publicDirectory || ! $imagePath || ! is_file($imagePath)) {
            return null;
        }

        $publicPrefix = rtrim($publicDirectory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        return str_starts_with(strtolower($imagePath), strtolower($publicPrefix))
            ? $imagePath
            : null;
    }
}
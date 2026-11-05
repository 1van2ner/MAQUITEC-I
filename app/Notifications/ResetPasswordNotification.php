<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPasswordNotification extends Notification
{
    public function __construct(private readonly string $token)
    {
    }

    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {
        $resetUrl = url(route('password.reset', ['token' => $this->token], false).'?email='.urlencode($notifiable->email));

        return (new MailMessage())
            ->subject('Restablece tu contraseña - MAQUITEC I.S.A.C.')
            ->view(
                [
                    'html' => 'emails.password-reset',
                    'text' => 'emails.password-reset-text',
                ],
                [
                    'nombre' => $notifiable->name ?? 'cliente',
                    'url' => $resetUrl,
                    'correo' => $notifiable->email,
                ]
            );
    }
}

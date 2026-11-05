<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('manage-admin', static fn (User $user): bool => $user->rol === 'Administrador');

        VerifyEmail::toMailUsing(static function (object $notifiable, string $url): MailMessage {
            return (new MailMessage())
                ->subject('Verifica tu correo electrónico - MAQUITEC I.S.A.C.')
                ->greeting('Hola, ' . $notifiable->name)
                ->line('Gracias por crear una cuenta en MAQUITEC I.S.A.C. Confirma tu correo para activar la cuenta y poder iniciar sesión.')
                ->action('Verificar mi correo', $url)
                ->line('Si no solicitaste crear esta cuenta, puedes ignorar este mensaje.');
        });
    }
}

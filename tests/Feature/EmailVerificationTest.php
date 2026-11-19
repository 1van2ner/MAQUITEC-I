<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_routes_are_disabled(): void
    {
        $this->get('/register')->assertNotFound();
        $this->post('/register')->assertNotFound();
        $this->assertDatabaseMissing('users', ['email' => 'cliente-nuevo@example.com']);
    }

    public function test_unverified_user_cannot_sign_in(): void
    {
        $user = User::create([
            'name' => 'Cliente pendiente',
            'email' => 'cliente-pendiente@example.com',
            'password' => 'clave-segura-123',
            'rol' => 'Administrador',
        ]);

        $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'clave-segura-123',
        ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_signed_verification_link_activates_account_and_allows_sign_in(): void
    {
        $user = User::create([
            'name' => 'Cliente verificado',
            'email' => 'cliente-verificado@example.com',
            'password' => 'clave-segura-123',
            'rol' => 'Administrador',
        ]);
        $verificationUrl = URL::temporarySignedRoute(
            'verification.verify',
            now()->addMinutes(60),
            ['id' => $user->id, 'hash' => sha1($user->email)]
        );

        $this->get($verificationUrl)
            ->assertRedirect(route('login'))
            ->assertSessionHas('status');

        $this->assertTrue($user->fresh()->hasVerifiedEmail());

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'clave-segura-123',
        ])->assertRedirect(route('admin.dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_unsigned_verification_link_is_rejected(): void
    {
        $user = User::create([
            'name' => 'Cliente sin firma',
            'email' => 'cliente-sin-firma@example.com',
            'password' => 'clave-segura-123',
            'rol' => 'Cliente',
        ]);

        $this->get(route('verification.verify', [
            'id' => $user->id,
            'hash' => sha1($user->email),
        ]))->assertForbidden();

        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }

    public function test_verification_email_can_be_resent(): void
    {
        Notification::fake();
        $user = User::create([
            'name' => 'Cliente reenvÃ­o',
            'email' => 'cliente-reenvio@example.com',
            'password' => 'clave-segura-123',
            'rol' => 'Cliente',
        ]);

        $this->withSession(['verification_email' => $user->email])
            ->post(route('verification.send'))
            ->assertRedirect(route('verification.notice'))
            ->assertSessionHas('status');

        Notification::assertSentTo($user, VerifyEmail::class);
    }
}
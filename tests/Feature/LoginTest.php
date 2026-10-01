<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_registered_user_can_sign_in_with_their_password(): void
    {
        $user = User::create([
            'name' => 'Cliente de prueba',
            'email' => 'cliente-login@example.com',
            'password' => Hash::make('clave-correcta-123'),
            'rol' => 'Cliente',
        ]);

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'clave-correcta-123',
        ])
            ->assertRedirect('/')
            ->assertSessionHasNoErrors();

        $this->assertAuthenticatedAs($user);
    }

    public function test_failed_sign_in_shows_an_error_and_keeps_the_email(): void
    {
        $user = User::create([
            'name' => 'Cliente de prueba',
            'email' => 'cliente-login-error@example.com',
            'password' => Hash::make('clave-correcta-123'),
            'rol' => 'Cliente',
        ]);

        $this->from('/login')->post('/login', [
            'email' => $user->email,
            'password' => 'clave-incorrecta',
        ])
            ->assertRedirect('/login')
            ->assertSessionHasErrors('email')
            ->assertSessionHas('_old_input.email', $user->email);

        $this->get('/login')
            ->assertOk()
            ->assertSee('Las credenciales proporcionadas no coinciden con nuestros registros.')
            ->assertSee('value="' . $user->email . '"', false);

        $this->assertGuest();
    }
}
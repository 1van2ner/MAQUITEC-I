<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfilePasswordUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_update_password_from_profile(): void
    {
        $user = User::create([
            'name' => 'Usuario de prueba',
            'email' => 'perfil-password@example.com',
            'password' => Hash::make('clave-anterior-123'),
            'rol' => 'Cliente',
        ]);

        $this->actingAs($user)->get(route('profile'))->assertOk();

        $this->actingAs($user)
            ->from(route('profile'))
            ->put(route('password.update.custom'), [
                'current_password' => 'clave-anterior-123',
                'password' => 'clave-nueva-456',
                'password_confirmation' => 'clave-nueva-456',
            ])
            ->assertRedirect(route('profile'))
            ->assertSessionHas('status', 'Tu contraseña se actualizó correctamente.');

        $this->assertTrue(Hash::check('clave-nueva-456', $user->fresh()->password));
    }

    public function test_password_update_rejects_an_incorrect_current_password(): void
    {
        $user = User::create([
            'name' => 'Usuario de prueba',
            'email' => 'perfil-password-error@example.com',
            'password' => Hash::make('clave-anterior-123'),
            'rol' => 'Cliente',
        ]);

        $this->actingAs($user)
            ->from(route('profile'))
            ->put(route('password.update.custom'), [
                'current_password' => 'incorrecta',
                'password' => 'clave-nueva-456',
                'password_confirmation' => 'clave-nueva-456',
            ])
            ->assertRedirect(route('profile'))
            ->assertSessionHasErrors('current_password');

        $this->assertTrue(Hash::check('clave-anterior-123', $user->fresh()->password));
    }
}
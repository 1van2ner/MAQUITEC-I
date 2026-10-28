<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_regular_user_cannot_access_administration_or_promote_their_own_role(): void
    {
        $user = User::factory()->create(['rol' => 'Cliente']);
        $this->actingAs($user);

        $this->get(route('admin.usuarios.index'))->assertForbidden();
        $this->get(route('admin.productos.index'))->assertForbidden();
        $this->put(route('admin.usuarios.update', $user), [
            'rol' => 'Administrador',
            'telefono' => '123456789',
            'direccion' => 'Dirección de prueba',
        ])->assertForbidden();

        $this->assertSame('Cliente', $user->fresh()->rol);
    }

    public function test_administrator_can_access_user_management(): void
    {
        $admin = User::factory()->create(['rol' => 'Administrador']);

        $this->actingAs($admin)
            ->get(route('admin.usuarios.index'))
            ->assertOk();
    }
}

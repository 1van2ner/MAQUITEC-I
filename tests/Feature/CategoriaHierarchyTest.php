<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoriaHierarchyTest extends TestCase
{
    use RefreshDatabase;

    public function test_categories_can_be_nested_and_are_shown_hierarchically(): void
    {
        $this->actingAs(User::factory()->create());

        $this->get(route('admin.categorias.create'))
            ->assertOk()
            ->assertSee('name="parent_id"', false);

        $this->post(route('admin.categorias.store'), [
            'nombre' => 'Equipos de prueba',
        ])->assertRedirect(route('admin.categorias.index'));

        $parent = Categoria::where('nombre', 'Equipos de prueba')->firstOrFail();

        $this->post(route('admin.categorias.store'), [
            'nombre' => 'Accesorios de prueba',
            'parent_id' => $parent->id,
        ])->assertRedirect(route('admin.categorias.index'));

        $child = Categoria::where('nombre', 'Accesorios de prueba')->firstOrFail();

        $this->assertSame($parent->id, $child->parent_id);

        $this->get(route('admin.categorias.index'))
            ->assertOk()
            ->assertDontSee('data-label="ID"', false)
            ->assertSee('Equipos de prueba')
            ->assertSee('Accesorios de prueba')
            ->assertSee('Subcategoría de Equipos de prueba');

        $this->get(route('admin.productos.create'))
            ->assertOk()
            ->assertSee('Equipos de prueba &gt; Accesorios de prueba', false);
    }
}

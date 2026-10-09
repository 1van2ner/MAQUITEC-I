<?php

namespace Tests\Feature;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminProductIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_featured_products_are_visible_first_and_can_be_filtered_or_searched(): void
    {
        $this->actingAs(User::factory()->create());
        $category = Categoria::query()->firstOrFail();

        for ($index = 1; $index <= 4; $index++) {
            $this->createProduct($category, "Destacado de prueba {$index}", true, now()->subDays(30));
        }

        for ($index = 1; $index <= 15; $index++) {
            $this->createProduct($category, "Producto normal {$index}", false, now()->subDays(15)->addMinutes($index));
        }

        $this->get(route('admin.productos.index'))
            ->assertOk()
            ->assertSee('Destacado de prueba 1')
            ->assertSee('Destacado de prueba 2')
            ->assertSee('Destacado de prueba 3')
            ->assertSee('Destacado de prueba 4')
            ->assertSee('Página 1 de 2')
            ->assertSee('Siguiente');

        $this->get(route('admin.productos.index', ['destacado' => '1']))
            ->assertOk()
            ->assertSee('Destacado de prueba 1')
            ->assertSee('de 4 productos')
            ->assertDontSee('Producto normal 1');

        $this->get(route('admin.productos.index', ['buscar' => 'Producto normal 15']))
            ->assertOk()
            ->assertSee('Producto normal 15')
            ->assertDontSee('Producto normal 14');
    }

    private function createProduct(Categoria $category, string $name, bool $featured, \Illuminate\Support\Carbon $createdAt): void
    {
        Producto::create([
            'categoria_id' => $category->id,
            'codigo' => strtoupper(str_replace(' ', '-', $name)),
            'nombre' => $name,
            'slug' => strtolower(str_replace(' ', '-', $name)),
            'descripcion' => 'Producto para prueba de administración.',
            'stock' => 1,
            'imagen' => 'img/logo_pagina_general/maquitec_2026_new.jpg',
            'destacado' => $featured,
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ]);
    }
}

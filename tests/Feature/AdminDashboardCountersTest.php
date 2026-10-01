<?php

namespace Tests\Feature;

use App\Models\Banner;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminDashboardCountersTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_receives_database_counts_for_each_module(): void
    {
        $admin = User::where('email', 'admin@maquitec.com')->firstOrFail();

        User::create([
            'name' => 'Cliente de prueba',
            'email' => 'cliente-contador@example.com',
            'password' => 'secret123',
            'rol' => 'Cliente',
        ]);

        $categoria = Categoria::create([
            'nombre' => 'Categoría de prueba',
            'slug' => 'categoria-de-prueba',
            'descripcion' => 'Categoría para validar el contador.',
        ]);

        Producto::create([
            'categoria_id' => $categoria->id,
            'codigo' => 'CONTADOR-001',
            'nombre' => 'Producto de prueba',
            'slug' => 'producto-de-prueba',
            'descripcion' => 'Producto para validar el contador.',
            'stock' => 1,
            'imagen' => 'img/logo_pagina_general/maquitec_2026_new.jpg',
        ]);

        Banner::create([
            'titulo' => 'Banner de prueba',
            'imagen' => 'img/banners/banner-contador.jpg',
        ]);

        $expectedCounts = [
            'totalProductos' => Producto::count(),
            'totalCategorias' => Categoria::count(),
            'totalBanners' => Banner::count(),
            'totalUsuarios' => User::count(),
        ];

        $response = $this->actingAs($admin)->get(route('admin.dashboard'));

        $response->assertOk()
            ->assertViewHas('totalProductos', $expectedCounts['totalProductos'])
            ->assertViewHas('totalCategorias', $expectedCounts['totalCategorias'])
            ->assertViewHas('totalBanners', $expectedCounts['totalBanners'])
            ->assertViewHas('totalUsuarios', $expectedCounts['totalUsuarios']);
    }
}
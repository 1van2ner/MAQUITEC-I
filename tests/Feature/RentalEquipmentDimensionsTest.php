<?php

namespace Tests\Feature;

use App\Http\Controllers\AlquilerController;
use App\Models\Alquiler;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Illuminate\Support\ViewErrorBag;
use Tests\TestCase;

class RentalEquipmentDimensionsTest extends TestCase
{
    use RefreshDatabase;

    public function test_equipment_dimensions_are_saved_and_displayed(): void
    {
        $alquiler = Alquiler::create([
            'nombre' => 'Montacargas de prueba',
            'slug' => 'montacargas-de-prueba',
            'combustible' => 'gasolina',
            'estado' => 'disponible',
            'activo' => true,
        ]);

        app(AlquilerController::class)->update(
            Request::create('/admin/alquileres/'.$alquiler->id, 'PUT', [
                'nombre' => $alquiler->nombre,
                'marca' => 'HELI',
                'toneladas' => '3',
                'combustible' => 'gasolina',
                'altura_maxima' => '4500',
                'ancho_pasillo' => '3200',
                'estado' => 'disponible',
                'descripcion' => 'Equipo de prueba',
                'especificaciones' => '',
                'activo' => '1',
            ]),
            $alquiler
        );

        $this->assertDatabaseHas('alquileres', [
            'id' => $alquiler->id,
            'altura_maxima' => 4500,
            'ancho_pasillo' => 3200,
        ]);

        $html = view('alquiler-cotizar', [
            'alquiler' => $alquiler->fresh(),
            'errors' => new ViewErrorBag,
        ])->render();
        $this->assertStringContainsString('Altura máxima', $html);
        $this->assertStringContainsString('4,500 mm', $html);
        $this->assertStringContainsString('Ancho de pasillo', $html);
        $this->assertStringContainsString('3,200 mm', $html);
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 100)->unique();
            $table->text('descripcion')->nullable();
            $table->string('imagen', 255)->nullable();
            $table->timestamps();
        });

        DB::table('categorias')->insert([
            ['nombre' => 'Apiladores Eléctricos', 'descripcion' => 'Equipos de carga y elevación de alta eficiencia para almacenes logísticos.'],
            ['nombre' => 'Montacargas', 'descripcion' => 'Vehículos industriales de carga pesada para movimiento y apilamiento.'],
            ['nombre' => 'Transpaletas', 'descripcion' => 'Equipos manuales y eléctricos para el transporte horizontal de pallets.'],
            ['nombre' => 'Repuestos y Accesorios', 'descripcion' => 'Componentes mecánicos, eléctricos e hidráulicos originales.'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
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
            ['nombre' => 'Apiladores ElÃ©ctricos', 'descripcion' => 'Equipos de carga y elevaciÃ³n de alta eficiencia para almacenes logÃ­sticos.'],
            ['nombre' => 'Montacargas', 'descripcion' => 'VehÃ­culos industriales de carga pesada para movimiento y apilamiento.'],
            ['nombre' => 'Transpaletas', 'descripcion' => 'Equipos manuales y elÃ©ctricos para el transporte horizontal de pallets.'],
            ['nombre' => 'Repuestos y Accesorios', 'descripcion' => 'Componentes mecÃ¡nicos, elÃ©ctricos e hidrÃ¡ulicos originales.'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
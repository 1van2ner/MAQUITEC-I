<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 50)->unique();
            $table->string('descripcion', 255)->nullable();
            $table->timestamps();
        });

        DB::table('roles')->insert([
            ['nombre' => 'Administrador', 'descripcion' => 'Control total del sistema, gestión de usuarios, inventario y reportes.'],
            ['nombre' => 'Tecnico', 'descripcion' => 'Encargado del soporte técnico, mantenimiento de equipos y maquinaria industrial.'],
            ['nombre' => 'Cliente', 'descripcion' => 'Usuario registrado que puede realizar pedidos, cotizaciones y seguimiento de servicios.'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
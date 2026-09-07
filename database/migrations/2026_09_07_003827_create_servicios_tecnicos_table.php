<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servicios_tecnicos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('tecnico_id')->nullable();
            $table->string('tipo_servicio', 100);
            $table->text('descripcion_problema');
            $table->text('diagnostico_tecnico')->nullable();
            $table->enum('estado_servicio', ['Solicitado', 'Asignado', 'En Ejecución', 'Finalizado'])->default('Solicitado');
            $table->dateTime('fecha_programada')->nullable();
            $table->timestamps();

            $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tecnico_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicios_tecnicos');
    }
};
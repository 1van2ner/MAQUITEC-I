<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alquileres', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug')->unique();
            $table->string('marca')->nullable();
            $table->decimal('toneladas', 6, 2)->nullable();
            $table->string('combustible')->default('gasolina');
            $table->string('estado')->default('disponible');
            $table->text('descripcion')->nullable();
            $table->text('especificaciones')->nullable();
            $table->string('imagen')->nullable();
            $table->json('imagenes')->nullable();
            $table->boolean('activo')->default(true);
            $table->boolean('destacado')->default(false);
            $table->timestamps();
        });

        Schema::create('alquiler_consultas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alquiler_id')->constrained('alquileres')->cascadeOnDelete();
            $table->string('nombre');
            $table->string('empresa')->nullable();
            $table->string('email');
            $table->string('telefono');
            $table->text('mensaje');
            $table->string('estado')->default('pendiente');
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alquiler_consultas');
        Schema::dropIfExists('alquileres');
    }
};

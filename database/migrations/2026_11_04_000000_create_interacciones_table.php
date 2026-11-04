<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('interacciones', function (Blueprint $table) {
            $table->id();
            $table->enum('tipo', ['producto', 'servicio']);
            $table->string('item', 255);
            $table->enum('canal', ['cotizacion', 'whatsapp']);
            $table->string('accion', 50)->default('consulta');
            $table->string('ip', 45)->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();

            $table->index(['tipo', 'item']);
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('interacciones');
    }
};

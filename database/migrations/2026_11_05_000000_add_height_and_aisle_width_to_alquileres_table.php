<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('alquileres', function (Blueprint $table) {
            $table->unsignedInteger('altura_maxima')->nullable();
            $table->unsignedInteger('ancho_pasillo')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('alquileres', function (Blueprint $table) {
            $table->dropColumn(['altura_maxima', 'ancho_pasillo']);
        });
    }
};

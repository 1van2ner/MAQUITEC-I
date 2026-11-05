<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('interacciones')
            ->where('tipo', 'servicio')
            ->where('item', 'Instalación de Equipos')
            ->update(['item' => 'Instalación de accesorios de equipos']);

        DB::table('interacciones')
            ->where('tipo', 'servicio')
            ->whereIn('item', [
                'Reparación Rápida y Correctiva',
                'Reparación Rápida & Correctiva',
            ])
            ->update(['item' => 'Reparación y diagnósticos de equipos']);
    }

    public function down(): void
    {
        DB::table('interacciones')
            ->where('tipo', 'servicio')
            ->where('item', 'Instalación de accesorios de equipos')
            ->update(['item' => 'Instalación de Equipos']);

        DB::table('interacciones')
            ->where('tipo', 'servicio')
            ->where('item', 'Reparación y diagnósticos de equipos')
            ->update(['item' => 'Reparación Rápida y Correctiva']);
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE interacciones MODIFY COLUMN tipo ENUM('producto', 'servicio', 'alquiler') NOT NULL");
        }
    }

    public function down(): void
    {
        DB::table('interacciones')->where('tipo', 'alquiler')->update(['tipo' => 'producto']);

        if (DB::getDriverName() === 'mysql') {
            DB::statement("ALTER TABLE interacciones MODIFY COLUMN tipo ENUM('producto', 'servicio') NOT NULL");
        }
    }
};

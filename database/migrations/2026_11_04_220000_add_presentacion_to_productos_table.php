<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropUnique('productos_codigo_unique');
            $table->string('presentacion')->nullable()->after('codigo');
            $table->unique(['codigo', 'presentacion'], 'productos_codigo_presentacion_unique');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropUnique('productos_codigo_presentacion_unique');
            $table->dropColumn('presentacion');
            $table->unique('codigo', 'productos_codigo_unique');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'tipo_usuario')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('tipo_usuario', 20)->default('persona')->after('rol');
            });
        }

        if (! Schema::hasColumn('users', 'documento')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('documento', 11)->nullable()->unique()->after('tipo_usuario');
            });
        }

        if (! Schema::hasColumn('users', 'fecha_nacimiento')) {
            Schema::table('users', function (Blueprint $table) {
                $table->date('fecha_nacimiento')->nullable()->after('documento');
            });
        }
    }

    public function down(): void
    {
        // These columns are part of the baseline users table migration.
    }
};
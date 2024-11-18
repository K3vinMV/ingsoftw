<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->enum('estado', ['pendiente', 'resuelto'])->default('pendiente'); // Estado del reporte
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reportes', function (Blueprint $table) {
            $table->dropColumn('estado'); // Eliminar la columna 'estado' si se revierte la migración
        });
    }
};
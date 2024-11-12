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
        Schema::create('intercambios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ofertante_id')->constrained('users')->onDelete('cascade'); // Usuario que ofrece el juego
            $table->foreignId('receptor_id')->constrained('users')->onDelete('cascade'); // Usuario que recibe el juego
            $table->foreignId('juego_ofrecido_id')->constrained('juegos')->onDelete('cascade'); // Juego ofrecido
            $table->foreignId('juego_solicitado_id')->constrained('juegos')->onDelete('cascade'); // Juego solicitado
            $table->enum('estado', ['pendiente', 'aceptado', 'rechazado'])->default('pendiente'); // Estado de la solicitud
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('intercambios');
    }
};

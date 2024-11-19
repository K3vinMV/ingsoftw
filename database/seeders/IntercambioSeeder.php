<?php
namespace Database\Seeders;

use App\Models\Intercambio;
use App\Models\User;
use App\Models\Juego;
use Illuminate\Database\Seeder;

class IntercambioSeeder extends Seeder
{
    public function run()
    {
        // Crear 5 intercambios aleatorios
        foreach (range(1, 5) as $index) {
            Intercambio::create([
                'ofertante_id' => User::inRandomOrder()->first()->id,  // Usuario aleatorio para el ofertante
                'receptor_id' => User::inRandomOrder()->first()->id,   // Usuario aleatorio para el receptor
                'juego_ofrecido_id' => Juego::inRandomOrder()->first()->id,  // Juego aleatorio ofrecido
                'juego_solicitado_id' => Juego::inRandomOrder()->first()->id,  // Juego aleatorio solicitado
                'estado' => collect(['pendiente', 'aceptado', 'rechazado'])->random(),  // Estado aleatorio
            ]);
        }
    }
}
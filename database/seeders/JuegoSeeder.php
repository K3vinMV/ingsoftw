<?php

namespace Database\Seeders;

use App\Models\Juego;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JuegoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener todos los usuarios
        $usuarios = User::all();

        // Crear juegos para cada usuario de forma aleatoria
        Juego::factory(25)->create()->each(function ($juego) use ($usuarios) {
            $juego->user_id = $usuarios->random()->id;
            $juego->save(); // Guardar la asociación del usuario con el juego
        });
    }
}

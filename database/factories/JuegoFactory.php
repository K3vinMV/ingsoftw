<?php

namespace Database\Factories;

use App\Models\Juego;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuegoFactory extends Factory
{
    protected $model = Juego::class;

    public function definition()
    {
        return [
            'nombre' => $this->faker->word,
            'compañia' => $this->faker->company,
            'plataforma' => $this->faker->randomElement(['PC', 'Xbox', 'PlayStation', 'Nintendo']),
            'categoria' => $this->faker->randomElement(['Acción', 'Aventura', 'Deportes', 'Estrategia']),
            'user_id' => User::factory(), // Asigna automáticamente un usuario existente
            'imagen' => 'juegos/prueba.jpg',
        ];
    }
}

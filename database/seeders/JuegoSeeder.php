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
        //
        Juego::factory(25)->create([
            'user_id' => User::all()->random()->id,
        ]);
    }
}

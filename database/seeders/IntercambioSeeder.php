<?php
namespace Database\Seeders;

use App\Models\Intercambio;
use Illuminate\Database\Seeder;

class IntercambioSeeder extends Seeder
{
    public function run()
    {
        Intercambio::create([
            'ofertante_id' => 1,
            'receptor_id' => 2,
            'juego_ofrecido_id' => 1,
            'juego_solicitado_id' => 2,
            'estado' => 'pendiente',
        ]);
    }
}
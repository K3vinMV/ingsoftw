<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intercambio extends Model
{
    use HasFactory;

    protected $fillable = ['ofertante_id', 'receptor_id', 'juego_ofrecido_id', 'juego_solicitado_id', 'estado'];

    // Relación con el usuario que ofrece el juego
    public function ofertante()
    {
        return $this->belongsTo(User::class, 'ofertante_id');
    }

    // Relación con el usuario que recibe el juego
    public function receptor()
    {
        return $this->belongsTo(User::class, 'receptor_id');
    }

    // Relación con el juego ofrecido
    public function juegoOfrecido()
    {
        return $this->belongsTo(Juego::class, 'juego_ofrecido_id');
    }

    // Relación con el juego solicitado
    public function juegoSolicitado()
    {
        return $this->belongsTo(Juego::class, 'juego_solicitado_id');
    }
}

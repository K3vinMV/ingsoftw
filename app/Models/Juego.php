<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Juego extends Model
{
    //
    use HasFactory;

    protected $fillable = ['nombre', 'compañia', 'plataforma', 'categoria', 'imagen'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

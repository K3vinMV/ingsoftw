<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'usuario_reportado_id',
        'descripcion',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function usuarioReportado()
    {
        return $this->belongsTo(User::class, 'usuario_reportado_id');
    }
}

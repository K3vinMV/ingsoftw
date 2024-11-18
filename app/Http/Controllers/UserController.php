<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function show()
    {
        $usuario = Auth::user();
        $juegos = $usuario->juegos; // Asumiendo que ya existe la relación 'juegos' en el modelo User

        return view('perfil', compact('usuario', 'juegos'));
    }
}

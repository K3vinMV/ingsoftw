<?php
namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Juego;
use App\Models\User;
use Illuminate\Http\Request;

class IntercambioController extends Controller
{
    // Mostrar todos los intercambios
    public function index()
    {
        $intercambios = Intercambio::all();
        return view('intercambios.index', compact('intercambios'));
    }

    // Crear una nueva solicitud de intercambio
    public function create()
    {
        $usuarios = User::all();
        $juegos = Juego::all();
        return view('intercambios.create', compact('usuarios', 'juegos'));
    }

    // Almacenar un intercambio en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'ofertante_id' => 'required|exists:users,id',
            'receptor_id' => 'required|exists:users,id',
            'juego_ofrecido_id' => 'required|exists:juegos,id',
            'juego_solicitado_id' => 'required|exists:juegos,id',
        ]);

        Intercambio::create($request->all());
        
        return redirect()->route('intercambios.index');
    }

    // Aceptar o rechazar un intercambio
    public function updateStatus(Intercambio $intercambio, $estado)
    {
        $intercambio->update(['estado' => $estado]);

        return redirect()->route('intercambios.index');
    }
}

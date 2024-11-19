<?php
namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Juego;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $usuarioAutenticado = Auth::user(); // Obtener al usuario autenticado
        $juegos = Juego::where('user_id', $usuarioAutenticado->id)->get(); // Juegos del usuario autenticado
        $todosLosJuegos = Juego::all(); // Todos los juegos disponibles para ser solicitados
        $usuarios = User::all(); // Todos los usuarios disponibles para ser los receptores

        return view('intercambios.create', compact('usuarioAutenticado', 'juegos', 'todosLosJuegos', 'usuarios'));
    }

    // Almacenar un intercambio en la base de datos
    public function store(Request $request)
    {
        // Validación de datos
        $request->validate([
            'receptor_id' => 'required|exists:users,id|different:ofertante_id', // Asegurarse de que no se seleccione al mismo usuario
            'juego_ofrecido_id' => 'required|exists:juegos,id',
            'juego_solicitado_id' => 'required|exists:juegos,id',
        ]);

        // Asignar el usuario autenticado al ofertante_id
        $request->merge(['ofertante_id' => auth::id()]);

        // Crear el intercambio
        Intercambio::create($request->all());

        // Redirigir a la lista de intercambios con un mensaje de éxito
        return redirect()->route('intercambios.index')->with('success', 'Intercambio creado exitosamente');
    }

    // Aceptar o rechazar un intercambio
    public function updateStatus(Intercambio $intercambio, $estado)
    {
        $intercambio->update(['estado' => $estado]);

        return redirect()->route('intercambios.index');
    }
}

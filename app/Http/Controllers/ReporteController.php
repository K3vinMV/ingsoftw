<?php

namespace App\Http\Controllers;

use App\Models\Intercambio;
use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReporteController extends Controller
{
    public function create($intercambioId)
    {
        $intercambio = Intercambio::findOrFail($intercambioId);
        return view('reportes.create', compact('intercambio'));
    }

    public function store(Request $request)
    {
        // Validación de los datos
        $validated = $request->validate([
            'descripcion' => 'required|string|max:255',
            'usuario_reportado_id' => 'required|exists:users,id',  // Asegúrate de que el ID del usuario reportado exista
        ]);

        // Verifica que el usuario esté autenticado
        $usuarioId = Auth::id();
        if (!$usuarioId) {
            return redirect()->route('login');  // Si no está autenticado, redirige al login
        }

        // Crear el reporte
        Reporte::create([
            'descripcion' => $validated['descripcion'],
            'usuario_reportado_id' => $validated['usuario_reportado_id'],  // Ofertante del intercambio
            'usuario_id' => $usuarioId,  // El usuario autenticado que está haciendo el reporte
        ]);

        // Redirigir al usuario con un mensaje de éxito
        return redirect()->route('intercambios.index')->with('success', 'Reporte enviado con éxito.');
    }

    public function index()
    {
        // Obtener todos los reportes activos, por ejemplo, los reportes pendientes
        $reportes = Reporte::where('estado', 'pendiente') // Si tienes un campo de estado
                        ->with(['usuario', 'usuarioReportado']) // Si quieres cargar las relaciones con usuarios
                        ->get();

        return view('reportes.index', compact('reportes'));
    }

    public function resolve($id)
    {
        // Encontrar el reporte por su ID
        $reporte = Reporte::findOrFail($id);

        // Cambiar su estado a "resuelto" o lo que sea adecuado
        $reporte->estado = 'resuelto'; 
        $reporte->save();

        return redirect()->route('reportes.index')->with('success', 'Reporte marcado como resuelto.');
    }
}

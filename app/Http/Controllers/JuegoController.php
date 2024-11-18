<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all();
        $juegos = Juego::with('user')->get();
        return view('juegos.index', compact('juegos'));
    }

    public function create()
    {
        return view('juegos.create');
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required',
            'compañia' => 'required',
            'plataforma' => 'required',
            'categoria' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen
        ]);
    
        // Guardar la imagen si se sube
        $imagePath = null;
        if ($request->hasFile('imagen')) {
            // Guardar la imagen y obtener la ruta
            $imagePath = $request->file('imagen')->store('juegos', 'public');
        }
        
        $data['user_id'] = Auth::id();
        // Crear el juego y guardar los datos en la base de datos
        Juego::create([
            'nombre' => $validated['nombre'],
            'compañia' => $validated['compañia'],
            'plataforma' => $validated['plataforma'],
            'categoria' => $validated['categoria'],
            'imagen' => $imagePath, // Guardar la ruta de la imagen
        ]);
    
        // Redirigir al listado de juegos con un mensaje de éxito
        return redirect()->route('juegos.index')->with('success', 'Juego creado exitosamente!');
    }

    public function show(Juego $juego)
    {
        return view('juegos.show', compact('juego'));
    }

    public function edit(Juego $juego)
    {
        return view('juegos.edit', compact('juego'));
    }

    public function update(Request $request, Juego $juego)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required',
            'compañia' => 'required',
            'plataforma' => 'required',
            'categoria' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen
        ]);

        // Si el usuario ha subido una nueva imagen, guardarla y eliminar la anterior si existe
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior del almacenamiento
            if ($juego->imagen) {
                Storage::disk('public')->delete($juego->imagen); // Eliminar la imagen anterior
            }

            // Guardar la nueva imagen y obtener la ruta
            $imagePath = $request->file('imagen')->store('juegos', 'public');
        } else {
            // Si no se ha subido una nueva imagen, mantener la imagen actual
            $imagePath = $juego->imagen;
        }

        // Actualizar el juego con los nuevos datos
        $juego->update([
            'nombre' => $validated['nombre'],
            'compañia' => $validated['compañia'],
            'plataforma' => $validated['plataforma'],
            'categoria' => $validated['categoria'],
            'imagen' => $imagePath, // Guardar la ruta de la imagen
        ]);

        // Redirigir al listado de juegos con un mensaje de éxito
        return redirect()->route('juegos.index')->with('success', 'Juego actualizado exitosamente!');
    }


    public function destroy(Juego $juego)
    {
        $juego->delete();
        return redirect()->route('juegos.index');
    }
}

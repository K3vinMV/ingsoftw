<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;

class JuegoController extends Controller
{
    public function index()
    {
        $juegos = Juego::all();
        return view('juegos.index', compact('juegos'));
    }

    public function create()
    {
        return view('juegos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'compañia' => 'required',
            'plataforma' => 'required',
            'categoria' => 'required',
        ]);

        Juego::create($request->all());
        return redirect()->route('juegos.index');
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
        $request->validate([
            'nombre' => 'required',
            'compañia' => 'required',
            'plataforma' => 'required',
            'categoria' => 'required',
        ]);

        $juego->update($request->all());
        return redirect()->route('juegos.index');
    }

    public function destroy(Juego $juego)
    {
        $juego->delete();
        return redirect()->route('juegos.index');
    }
}

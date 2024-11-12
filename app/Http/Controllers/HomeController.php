<?php

namespace App\Http\Controllers;

use App\Models\Juego;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $juegos = Juego::all();
        return view('index', compact('juegos'));
    }
}

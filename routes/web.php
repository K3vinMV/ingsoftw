<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntercambioController;
use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Juegos
Route::resource('juegos', JuegoController::class);

Route::resource('intercambios', IntercambioController::class);
Route::patch('intercambios/{intercambio}/estado/{estado}', [IntercambioController::class, 'updateStatus'])->name('intercambios.updateStatus');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

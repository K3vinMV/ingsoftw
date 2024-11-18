<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\IntercambioController;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\UserController;
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

Route::middleware('auth')->group(function () {
    // Ruta para crear un reporte
    Route::get('/reportes/create/{intercambio}', [ReporteController::class, 'create'])->name('reportes.create');
    
    // Ruta para almacenar el reporte
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');
    
    // Ruta para ver los reportes activos
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
    
    // Ruta para marcar un reporte como resuelto
    Route::patch('/reportes/{id}/resolver', [ReporteController::class, 'resolve'])->name('reportes.resolve');
});

Route::middleware('auth')->group(function () {
    Route::get('/perfil', [UserController::class, 'show'])->name('perfil.show');
});
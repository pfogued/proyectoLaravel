<?php

use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['verified'])->name('dashboard');

// Rutas de Profile (opcional, si no necesitas usarlo, puedes eliminar este bloque)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rutas de Personajes sin protección de autenticación
Route::get('/personajes', [PersonajeController::class, 'index'])->name('personajes.index'); // Lista de personajes
Route::get('/personajes/create', [PersonajeController::class, 'create'])->name('personajes.create'); // Formulario de creación
Route::post('/personajes', [PersonajeController::class, 'store'])->name('personajes.store'); // Guardar personaje
Route::get('/personajes/{personaje}', [PersonajeController::class, 'show'])->name('personajes.show'); // Mostrar personaje
Route::get('/personajes/{personaje}/edit', [PersonajeController::class, 'edit'])->name('personajes.edit'); // Formulario de edición
Route::put('/personajes/{personaje}', [PersonajeController::class, 'update'])->name('personajes.update'); // Actualizar personaje
Route::delete('/personajes/{personaje}', [PersonajeController::class, 'destroy'])->name('personajes.destroy'); // Eliminar personaje

// Requiere la autenticación para la parte de login y registro (deshabilitada por ahora)
require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\PersonajeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas de login y registro
Route::middleware('guest')->group(function () {
    // Las rutas de login y registro solo deben estar disponibles para los usuarios no autenticados
    Route::get('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'create'])
        ->name('login');
    Route::post('/login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'create'])
        ->name('register');
    Route::post('/register', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'store']);
});

// Después de iniciar sesión, el usuario podrá acceder a estas rutas
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas de Profile (opcional, si no necesitas usarlo, puedes eliminar este bloque)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rutas de Personajes, protegidas por autenticación
    Route::get('/personajes', [PersonajeController::class, 'index'])->name('personajes.index'); // Lista de personajes
    Route::get('/personajes/create', [PersonajeController::class, 'create'])->name('personajes.create'); // Formulario de creación
    Route::post('/personajes', [PersonajeController::class, 'store'])->name('personajes.store'); // Guardar personaje
    Route::get('/personajes/{personaje}', [PersonajeController::class, 'show'])->name('personajes.show'); // Mostrar personaje
    Route::get('/personajes/{personaje}/edit', [PersonajeController::class, 'edit'])->name('personajes.edit'); // Formulario de edición
    Route::put('/personajes/{personaje}', [PersonajeController::class, 'update'])->name('personajes.update'); // Actualizar personaje
    Route::delete('/personajes/{personaje}', [PersonajeController::class, 'destroy'])->name('personajes.destroy'); // Eliminar personaje
});


//IDIOMAS
Route::get("language/{locale}", LanguageController::class)->name('language');

// Requiere la autenticación para la parte de login y registro (deshabilitada por ahora)
require __DIR__.'/auth.php';

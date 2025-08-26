<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\TratamientoController; // Asegúrate de que esta línea esté presente
use Illuminate\Support\Facades\Route;

// Define las rutas de tus recursos (tablas) primero
Route::resource('citas', CitaController::class);
Route::resource('pacientes', PacienteController::class);
Route::resource('tratamientos', TratamientoController::class);

// Ahora, define la ruta de bienvenida por defecto al final
Route::get('/', function () {
    return view('welcome');
});
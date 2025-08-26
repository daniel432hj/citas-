<?php



// En routes/web.php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

Route::resource('citas', CitaController::class);
Route::resource('pacientes', PacienteController::class);

Route::get('/', function () {
    return view('welcome');
});

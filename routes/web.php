<?php



// En routes/web.php

use App\Http\Controllers\CitaController;
use Illuminate\Support\Facades\Route;

Route::resource('citas', CitaController::class);

Route::get('/', function () {
    return view('welcome');
});

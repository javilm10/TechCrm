<?php

use App\Http\Controllers\TasacionController;
use App\Http\Controllers\HistorialTasacionController;
use Illuminate\Support\Facades\Route;

Route::resource('tasaciones', TasacionController::class);
Route::resource('historial', HistorialTasacionController::class);


Route::get('/', function () {
    return view('welcome');
    
});

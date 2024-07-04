<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Ruta para insertar un material
Route::post('/materiales', [MaterialController::class, 'store']);

// Ruta para actualizar un material
Route::put('/materiales/{id}', [MaterialController::class, 'update']);

// Ruta para obtener la lista de materiales
Route::get('/materiales', [MaterialController::class, 'index']);
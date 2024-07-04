<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::post('/materiales', [MaterialController::class, 'store']);
Route::put('/materiales/{id}', [MaterialController::class, 'update']);
Route::get('/materiales', [MaterialController::class, 'index']);
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
// Ruta para insertar un material



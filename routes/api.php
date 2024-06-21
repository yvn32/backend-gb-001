<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CuentaController;
use App\Http\Controllers\API\MensajeController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1/cuentas')->group(function () {
    Route::get('/',[ CuentaController::class, 'get']); //get aquí es el nombre de la función en CuentaController.php
    Route::post('/',[ CuentaController::class, 'create']);
    Route::get('/{id}',[ CuentaController::class, 'getById']);
    Route::put('/{id}',[ CuentaController::class, 'update']);
    Route::delete('/{id}',[ CuentaController::class, 'delete']);
});

Route::prefix('v1/mensajes')->group(function () {
    Route::get('/',[ MensajeController::class, 'get']);
    Route::post('/',[ MensajeController::class, 'create']);
    Route::get('/{id}',[ MensajeController::class, 'getById']);
    Route::put('/{id}',[ MensajeController::class, 'update']);
    Route::delete('/{id}',[ MensajeController::class, 'delete']);
});

// Route::prefix('v1/cuentas')->middleware(\App\Http\Middleware\CorsMiddleware::class)->group(function () {
//     Route::get('/', [\App\Http\Controllers\API\CuentaController::class, 'get']);
//     Route::post('/', [\App\Http\Controllers\API\CuentaController::class, 'create']);
//     Route::get('/{id}', [\App\Http\Controllers\API\CuentaController::class, 'getById']);
//     Route::put('/{id}', [\App\Http\Controllers\API\CuentaController::class, 'update']);
//     Route::delete('/{id}', [\App\Http\Controllers\API\CuentaController::class, 'delete']);
// });

// Route::prefix('v1/mensajes')->middleware(\App\Http\Middleware\CorsMiddleware::class)->group(function () {
//     Route::get('/', [\App\Http\Controllers\API\MensajeController::class, 'get']);
//     Route::post('/', [\App\Http\Controllers\API\MensajeController::class, 'create']);
//     Route::get('/{id}', [\App\Http\Controllers\API\MensajeController::class, 'getById']);
//     Route::put('/{id}', [\App\Http\Controllers\API\MensajeController::class, 'update']);
//     Route::delete('/{id}', [\App\Http\Controllers\API\MensajeController::class, 'delete']);
// });

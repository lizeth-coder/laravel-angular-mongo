<?php

use App\Http\Controllers\Api\LibroController;
use Illuminate\Support\Facades\Route;

// Prefijo /api automático → /api/libros, /api/libros/{id}
Route::apiResource('libros', LibroController::class);

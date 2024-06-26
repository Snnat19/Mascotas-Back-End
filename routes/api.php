<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\RegistroController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AdminController::class, 'register']);
Route::post('/login', [AdminController::class, 'login']);

// API usuarios 
    Route::get('/registro', [RegistroController::class, 'index']);
    Route::get('/registro/{id}', [RegistroController::class, 'show']);
    Route::post('/registro', [RegistroController::class, 'store']);
    Route::put('/registro/{id}', [RegistroController::class, 'update']);
    Route::delete('/registro/{id}', [RegistroController::class, 'destroy']);

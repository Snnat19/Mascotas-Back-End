<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\RegistroController;




//API usuarios 
Route::get('/registro', [RegistroController::class, 'index' ]); 
Route::get('/registro/{id}', [RegistroController::class, 'show']);
Route::post('/registro', [RegistroController::class, 'store']);
Route::put('/registro/{id}', [RegistroController::class, 'update']);
Route::delete('/registro/{id}',[RegistroController::class, 'destroy']);
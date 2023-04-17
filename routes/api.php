<?php

use App\Http\Controllers\TokenAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Mobile Registration
Route::post('/auth/login', [TokenAuthController::class, 'store'])->middleware('guest');
Route::post('/auth/register', [TokenAuthController::class, 'register'])->middleware('guest');
Route::delete('/auth/logout', [TokenAuthController::class, 'destroy'])->middleware('auth:sanctum');
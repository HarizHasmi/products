<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductsController::class,'index'])->middleware('auth:sanctum');
Route::get('/products/{id}',[ProductsController::class,'show'])->middleware('auth:sanctum');
Route::post('/products',[ProductsController::class,'store'])->middleware('auth:sanctum');
Route::put('/products/{id}',[ProductsController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/products/{id}',[ProductsController::class, 'destroy'])->middleware('auth:sanctum');
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login',[AuthController::class,'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/auth/me',[AuthController::class,'me'])->middleware('auth:sanctum');

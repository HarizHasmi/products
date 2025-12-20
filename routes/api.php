<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;

Route::get('/products',[ProductsController::class,'index']);
Route::get('/products/{id}',[ProductsController::class,'show']);
Route::post('/products',[ProductsController::class,'store']);
Route::put('/products/{id}',[ProductsController::class, 'update']);
Route::delete('/products/{id}',[ProductsController::class, 'destroy']);

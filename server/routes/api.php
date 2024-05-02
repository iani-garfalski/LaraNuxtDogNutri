<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DogBreedController;
use App\Http\Controllers\DogFoodController;
use App\Http\Controllers\StockpileController;
use App\Http\Controllers\InvoiceController;

Route::post('auth/register', [AuthController::class, 'register']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->resource('dog-breeds', DogBreedController::class)->except(['create', 'edit']);
Route::middleware('auth:sanctum')->resource('dog-foods', DogFoodController::class)->except(['create', 'edit']);
Route::middleware('auth:sanctum')->resource('stockpiles', StockpileController::class)->except(['create', 'edit']);
Route::get('/invoice', [InvoiceController::class, 'index']);

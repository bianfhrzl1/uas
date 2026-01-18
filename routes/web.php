<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\Admin\DestinationAdminController;
use App\Http\Controllers\Admin\AuthController;

Route::get('/admin/login',[AuthController::class,'loginForm']);
Route::post('/admin/login',[AuthController::class,'login']);
Route::post('/admin/logout',[AuthController::class,'logout']);


Route::prefix('admin')->group(function () {
    Route::get('/destinations', [DestinationAdminController::class, 'index']);
    Route::get('/destinations/create', [DestinationAdminController::class, 'create']);
    Route::post('/destinations', [DestinationAdminController::class, 'store']);
    Route::get('/destinations/{id}/edit', [DestinationAdminController::class, 'edit']);
    Route::put('/destinations/{id}', [DestinationAdminController::class, 'update']);
    Route::delete('/destinations/{id}', [DestinationAdminController::class, 'destroy']);
});

Route::get('/', [DestinationController::class, 'index']);

Route::get('/', [DestinationController::class,'index']);
Route::get('/destination/{destination}', [DestinationController::class,'show']);
Route::post('/review/{id}', [DestinationController::class,'storeReview']);

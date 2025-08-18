<?php

use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/clear', [DashboardController::class, 'clear']);

Route::get('/configs', [ConfigController::class, 'index']);
Route::get('/configs/clear', [ConfigController::class, 'clear']);
Route::get('/configs/create', [ConfigController::class, 'create']);
Route::delete('/configs/{id}', [ConfigController::class, 'delete']);
Route::post('/configs', [ConfigController::class, 'store']);

<?php

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/', [ApiController::class, 'webhook']);
Route::post('{any}', [ApiController::class, 'webhook'])->where('any', '.*');

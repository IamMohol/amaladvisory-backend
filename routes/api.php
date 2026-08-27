<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
use App\Http\Controllers\Api\ContactController;
Route::post('/contact', [ContactController::class, 'store'])->middleware('throttle:5,1');

<?php

use App\Http\Controllers\API\ProductDashboard;
use App\Http\Controllers\API\ShiperDashboardController;
use App\Http\Controllers\API\UserDashboard;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResource('/userdashboard', UserDashboard::class)->middleware('redireact');
Route::middleware(['auth:sanctum'])->group(function () {

    // Route::get('/login', [LoginController::class, 'login']);
});

Route::apiResource('/userdashboard', UserDashboard::class);
Route::apiResource('/productdashboard', ProductDashboard::class);
Route::apiResource('/shiperdashboard', ShiperDashboardController::class);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SanctumAuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/me', [AuthController::class, 'me']);

Route::post('/sanctum-login', [SanctumAuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/me', [SanctumAuthController::class, 'me']);

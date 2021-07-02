<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\UserController as UserV1;

Route::apiResource('v1/users', UserV1::class)
  ->only(['index', 'show'])
  ->middleware('auth:sanctum');

Route::post('v1/login', [
    App\Http\Controllers\Api\V1\LoginController::class,
    'login'
]);

Route::post('v1/register', [
    App\Http\Controllers\Api\V1\RegisterController::class,
    'register'
]);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\UserController as UserV1;
use App\Http\Controllers\Api\V1\TweetController as TweetV1;

Route::prefix('v1')->group(function () {

    Route::middleware(['auth:sanctum'])->group(function () {

        Route::prefix('users')->group(function () {
            Route::get('/',[UserV1::class,'list']);
        });

        Route::prefix('tweets')->group(function () {
            Route::get('/',[TweetV1::class,'list']);
            Route::post('new_tweet',[TweetV1::class,'newTweet']);
        });

        Route::get('logout', [
            App\Http\Controllers\Api\V1\LoginController::class,
            'logout'
        ]);
    });

    Route::post('login', [
        App\Http\Controllers\Api\V1\LoginController::class,
        'login'
    ]);
    Route::post('register', [
        App\Http\Controllers\Api\V1\RegisterController::class,
        'register'
    ]);
    
});
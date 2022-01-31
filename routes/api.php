<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\NoteController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::post('auth/login', [AuthController::class, 'signIn'])->name("login");

Route::middleware('auth:sanctum')->group( function () {
    Route::get('me',[AuthController::class, 'me']);
    Route::apiResource('notes', NoteController::class);
    Route::apiResource('users', UserController::class);
});

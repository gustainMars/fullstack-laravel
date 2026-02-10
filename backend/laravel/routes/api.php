<?php

use App\Http\Controllers\User\CreateUserController;
use App\Http\Controllers\User\ListUserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', CreateUserController::class);
Route::get('/users', ListUserController::class);
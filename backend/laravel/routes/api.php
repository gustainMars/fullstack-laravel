<?php

use App\Http\Controllers\User\CreateUserController;
use Illuminate\Support\Facades\Route;

Route::post('/users', CreateUserController::class);
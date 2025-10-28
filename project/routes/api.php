<?php

use App\Http\Controllers\PaymentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/deposit', [PaymentController::class, 'deposit']);
Route::post('/withdraw', [PaymentController::class, 'withdraw']);
Route::post('/transfer', [PaymentController::class, 'transfer']);

Route::get('/balance/{user}', [UserController::class, 'getBalance'])
    ->where('user', '[0-9]+');


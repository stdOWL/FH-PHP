<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TransactionController;

Route::prefix('auth')->group(function () {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/me', [AuthController::class, 'me']);
});

Route::prefix('transaction')->group(function () {
    Route::get('{transactionId}/client', [TransactionController::class, 'client']);
    Route::get('{transactionId}', [TransactionController::class, 'info']);
    Route::post('list', [TransactionController::class, 'list']);
    Route::post('report', [TransactionController::class, 'report']);
});
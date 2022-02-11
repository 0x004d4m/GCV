<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    CategoryController,
    CardController,
    BalanceRequestController
};

Route::group([
    'middleware' => 'auth.client'
], function () {
    Route::get('category', [CategoryController::class, 'index']);

    Route::group([
        'prefix' => 'card',
    ], function () {
        Route::get('/', [CardController::class, 'index']);
        Route::get('{serial}/', [CardController::class, 'show']);
        Route::get('{serial}/print', [CardController::class, 'print']);
        Route::post('/', [CardController::class, 'save']); // category, quantity, auth, return PDF of Generated Cards
        Route::post('/use', [CardController::class, 'useCard']);
    });

    Route::group([
        'prefix' => 'balance',
    ], function () {
        Route::get('/', [BalanceRequestController::class, 'index']);
        Route::post('/', [BalanceRequestController::class, 'save']);
    });
});

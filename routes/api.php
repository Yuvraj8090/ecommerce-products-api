<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiTokenController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|

*/

// Public routes (no authentication required)
Route::prefix('public')->group(function () {
    Route::get('/products', [ProductController::class, 'indexPublic']);
    Route::get('/products/{id}', [ProductController::class, 'showPublic']);
});


    // User routes
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // API Token management
    

    // Product CRUD routes
    Route::apiResource('products', ProductController::class)->except(['index', 'show']);

    // Additional product routes
    Route::prefix('products')->group(function () {
        Route::get('/', [ProductController::class, 'index']); // Protected index
        Route::get('/{id}', [ProductController::class, 'show']); // Protected show
        Route::get('category/{category}', [ProductController::class, 'getByCategory']);
        Route::get('active', [ProductController::class, 'getActiveProducts']);
    });

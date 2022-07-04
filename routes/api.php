<?php

use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('warehouse')->group(function () {
    Route::get('/', [WarehouseController::class, 'index']);
    Route::get('/search', [WarehouseController::class, 'search']);
    Route::get('/{id}', [WarehouseController::class, 'show']);
});

Route::prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index']);
    Route::get('/search', [ProductController::class, 'search']);
    Route::get('/{id}', [ProductController::class, 'show']);
});

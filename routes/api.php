<?php

use App\Http\Controllers\Api\WarehouseController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('warehouse')->group(function () {
    Route::get('/', [WarehouseController::class, 'index']);
    Route::get('/search', [WarehouseController::class, 'search']);
    Route::get('/{id}', [WarehouseController::class, 'show']);
});
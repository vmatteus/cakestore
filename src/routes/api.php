<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CakeStockController;

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


// Cake
Route::get('cake/list', [CakeController::class, 'list']);
Route::get('cake/{id}', [CakeController::class, 'get']);
Route::delete('cake/{id}', [CakeController::class, 'delete']);
Route::post('cake', [CakeController::class, 'create']);
Route::put('cake/{id}', [CakeController::class, 'update']);

// CakeStock
Route::get('cakestock/list', [CakeStockController::class, 'list']);
Route::get('cakestock/{id}', [CakeStockController::class, 'get']);
Route::delete('cakestock/{id}', [CakeStockController::class, 'delete']);
Route::post('cakestock', [CakeStockController::class, 'create']);
Route::put('cakestock/{id}', [CakeStockController::class, 'update']);
<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CakeController;

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

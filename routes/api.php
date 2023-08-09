<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ProductAttributeController;
use App\Http\Controllers\OrderApiController;
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

Route::get("list-attributes", [ProductAttributeController::class, "apiIndex"]);
// Route::get('products/{id}',[ProductApiController::class],"index");


// orders api
Route::get('/orders', [OrderApiController::class, 'index']);
// Route::get('/orders/{id}', [OrderApiController::class, 'show']);
// Route::put('/orders/{id}', [OrderApiController::class, 'update']);
// Route::delete('/orders/{id}', [OrderApiController::class, 'destroy']);

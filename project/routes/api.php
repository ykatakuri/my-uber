<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
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

Route::get('client/product', [CartController::class, 'index']);
Route::get('client/profile', [ProfileController::class, 'index']);
Route::get('seller/order', [OrderController::class, 'index']);
Route::get('product', [ProductController::class, 'index']);
Route::get('shipper/order', [OrderController::class, 'displayOrders']);

Route::post('client/product', [CartController::class, 'store']);
Route::post('client/profile', [ProfileController::class, 'store']);
Route::post('client/order', [OrderController::class, 'store']);

Route::put('shipper/order/{order}', [OrderController::class, 'updateShipper']);


Route::resources([
    'client'=> ClientController::class,
    'order'=> OrderController::class,
    'commande'=> OrderController::class
]);


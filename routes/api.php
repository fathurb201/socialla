<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('timeBomb', [UserController::class, 'timeBomb']);

// AUTH 
Route::get('profile', [UserController::class, 'getAuthenticatedUser']);
Route::post('user-register', [UserController::class, 'register']);
Route::post('user-login', [UserController::class, 'login']);

// USER
Route::get('user', [UserController::class, 'getAllUser'])->middleware('superadmin');

// PRODUCT
Route::resource('product', ProductController::class);

// BRAND
Route::resource('brand', BrandController::class);

// CART
// Route::put('addQuantity/{id}', [CartController::class, 'addQuantity']);
Route::resource('cart', CartController::class);
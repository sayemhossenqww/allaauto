<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('orders', [\App\Http\Controllers\API\V1\OrderController::class, 'index'])->name('api.orders.index');
Route::get('quotations', [\App\Http\Controllers\API\V1\OrderController::class, 'index1'])->name('api.quotations.index');
Route::get('v1/orders', [\App\Http\Controllers\API\V1\OrderController::class, 'show'])->name('api.orders.show');

Route::get('products', [\App\Http\Controllers\API\V1\ProductController::class, 'index'])->name('api.products.index');
Route::get('v1/products', [\App\Http\Controllers\API\V1\ProductController::class, 'show'])->name('api.products.show');

Route::get('categories', [\App\Http\Controllers\API\V1\CategoryController::class, 'index'])->name('api.categories.index');
Route::get('v1/categories', [\App\Http\Controllers\API\V1\CategoryController::class, 'show'])->name('api.categories.show');
Route::get('v1/users', [\App\Http\Controllers\API\V1\UserController::class, 'show'])->name('api.users.show');


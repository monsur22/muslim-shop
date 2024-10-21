<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PaymentMethodController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductReturnController;
use App\Http\Controllers\Api\SalesController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\TransferController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrderController::class);
});
Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest')
                ->name('register');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest')
                ->name('login');
Route::apiResource('brands',BrandController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('stores', StoreController::class);
Route::apiResource('products', ProductController::class);
Route::post('/product-transfer', [TransferController::class, 'transferProduct']);
// Route::apiResource('orders', OrderController::class);
Route::apiResource('sales', SalesController::class);
Route::post('/sales/{sale}/return', [SalesController::class, 'return']);
Route::get('/sales-returns', [SalesController::class, 'salesReturnList']);
Route::post('/product-return', [ProductReturnController::class, 'returnProduct']);

// Route::middleware('auth:sanctum')->get('/user', [UserController::class, 'getUser']);

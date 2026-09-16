 <?php

use App\Http\Controllers\Api\ApiAuthrController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;


Route::post('/register', [ApiAuthrController::class, 'register']);
Route::post('/login', [ApiAuthrController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [ApiAuthrController::class, 'logout']);

    Route::apiResource('categories', CategoryController::class);
    Route::apiResource('products', ProductController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('orders', OrderController::class);
    Route::apiResource('order-items', OrderItemController::class);
});
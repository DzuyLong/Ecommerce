<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductCategoryController;
use App\Http\Controllers\Api\ProductInventoryController;
use App\Http\Controllers\IndexController;
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

Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::get('/user', [\App\Http\Controllers\Api\AuthController::class, 'getUser']);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
    
    Route::apiResource('productCategory', ProductCategoryController::class);
    Route::apiResource('productInventory', ProductInventoryController::class);
    Route::apiResource('products', ProductController::class);
});
Route::get('get-products', [IndexController::class, 'index']);
Route::get('get-listPC', [IndexController::class, 'listCate']);
Route::get('danh-muc/{slug}', [IndexController::class, 'Category']);
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
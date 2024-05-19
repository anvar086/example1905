<?php

/*use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;*/

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\api\v1\ArticleController;
use App\Http\Controllers\api\v1\WeatherController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('category', [\App\Http\Controllers\api\v1\CategoryController::class, 'store']);
    Route::get('category-show/{id}', [\App\Http\Controllers\api\v1\CategoryController::class, 'show']);
    Route::get('category-all', [\App\Http\Controllers\api\v1\CategoryController::class, 'index']);
    Route::post('category-update/{id}', [\App\Http\Controllers\api\v1\CategoryController::class, 'update']);
    Route::delete('category-delete/{id}', [\App\Http\Controllers\api\v1\CategoryController::class, 'delete']);
    Route::get('products-all',[\App\Http\Controllers\api\v1\ProductController::class, 'index']);
    Route::get('product-show/{id}',[\App\Http\Controllers\api\v1\ProductController::class, 'show']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

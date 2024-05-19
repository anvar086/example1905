<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['web','auth']], function () {
/*    Route::group(['namespace' => 'client'], function () {*/
        Route::resource('pages', App\Http\Controllers\Admin\PageController::class);
        /*Route::get('pages/create', [App\Http\Controllers\Admin\PageController::class, 'create'])
        ->name('pages.create');
        Route::post('pages/store', [App\Http\Controllers\Admin\PageController::class, 'store'])
            ->name('pages.store');*/

        /*Route::get('categories', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])
            ->name('categories');
        Route::post('category/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])
            ->name('category.store');*/
        Route::resource('category',\App\Http\Controllers\Admin\CategoryController::class);
        Route::resource('products',\App\Http\Controllers\Admin\ProductController::class);
    /*});*/
});
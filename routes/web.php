<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
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

Route::get('/', [PagesController::class, 'index'])->name('index');

Route::controller(ProductController::class)->name('product.')->group(function () {
    Route::get('/catalog', 'index')->name('catalog');
    Route::get('/product/{product}', 'show')->name('show');

    Route::middleware('admin')->group(function () {
        Route::get('/add-product', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit//{product}', 'edit')->name('edit');
        Route::put('/edit/{product}/update', 'update')->name('update');
        Route::delete('/delete/{product}', 'destroy')->name('delete');
    });
});

Route::middleware('auth')->controller(CartController::class)->name('cart.')->group(function () {
    Route::get('/cart', 'index')->name('index');
    Route::get('/cart/{product}', 'store')->name('store');
    Route::delete('/cart/{product}/delete', 'destroy')->name('delete');
    Route::post('/cart/{product}/change-count', 'changeCount')->name('changeCount');
});

Route::controller(AuthController::class)->name('auth.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/reg', 'create')->name('create');
        Route::post('/reg/store', 'store')->name('store');
        Route::get('/login', 'login')->name('login');
        Route::post('/log', 'log')->name('log');
    });
    Route::middleware('auth')->post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->controller(OrderController::class)->name('order.')->group(function() {
    Route::get('/orders', 'index')->name('index');
    Route::post('/orders/store', 'store')->name('store');
    Route::put('/orders/{order}/change-status', 'changeStatus')->name('changeStatus')->middleware('admin');
});

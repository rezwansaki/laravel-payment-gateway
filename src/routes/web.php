<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/demo', [DemoController::class, 'index']);

Route::post('/view', [DemoController::class, 'view']);

Route::get('/products', [DemoController::class, 'products']);

Route::get('/orders', [DemoController::class, 'orders'])->name('orders');

Route::post('/add-to-cart', [DemoController::class, 'addToCart'])->name('cart.add');

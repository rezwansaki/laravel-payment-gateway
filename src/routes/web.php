<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::get('/', [DemoController::class, 'products']);

Route::post('/add-to-cart', [DemoController::class, 'addToCart'])->name('cart.add');

Route::get('/orders', [DemoController::class, 'orders'])->name('orders');

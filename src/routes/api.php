<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;

Route::post('/success', [DemoController::class, 'success']);

Route::post('/fail', [DemoController::class, 'fail']);

Route::post('/cancel', [DemoController::class, 'cancel']);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('products', ProductController::class);
Route::resource('customers', CustomerController::class);
Route::resource('orders', OrderController::class);

Route::get('customers/{id}/history', [OrderController::class, 'history'])->name('customers.history');


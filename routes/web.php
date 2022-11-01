<?php

use App\Http\Controllers\OrderController;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => [HandleInertiaRequests::class],
], function () {

    Route::get('', [OrderController::class, 'create'])->name('orders.create');
    Route::post('order', [OrderController::class, 'store'])->name('orders.store');
    Route::get('orders/{order}/success', [OrderController::class, 'success'])->name('orders.success');

});

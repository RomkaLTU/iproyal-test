<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('orders', [OrderController::class, 'index'])->name('orders');
Route::get('orders/{order:order_number}', [OrderController::class, 'get'])->name('orders.get');
Route::post('orders', [OrderController::class, 'post'])->name('orders.post');

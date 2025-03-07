<?php

use App\Http\Controllers\OrderController;
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

Route::get('/customer/{id?}/{name?}/{address?}', [OrderController::class, 'customer'])->name('customer'); //alias sa route links
Route::get('/item/{itemNo?}/{name?}/{price?}', [OrderController::class, 'item'])->name('item');
Route::get('/order/{customerId?}/{name?}/{orderNo?}/{date?}', [OrderController::class, 'order'])->name('order');
Route::get('/details/{transNo?}/{orderNo?}/{itemId?}/{name?}/{price?}/{qty?}', [OrderController::class, 'details'])->name('details');

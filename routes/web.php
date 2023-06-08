<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;

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

Route::controller(OrderController::class)->group(function () {
    // Route::get('/', [OrderController, 'index'])->name('order.index');
    Route::get('/order/', 'index')->name('order.index');
    Route::get('/order/edit/{id}', 'edit')->name('order.edit');
    Route::delete('/order/destroy/{id}', 'destroy')->name('order.destroy');
    Route::put('/order/update/{id}', 'update')->name('order.update');
    // Route::post('/orders', 'store');
});
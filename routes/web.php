<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\CarTypesController;
use App\Http\Controllers\CarListController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OfferController;

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
    return view('index');
})->name('dashboard');

Route::group(['prefix' => 'user'], function () {
    Route::get('/settings', [UserController::class, 'settings'])->name('settings.index');
});

// Route::controller(OrderController::class)->group(function () {
//     // Route::get('/', [OrderController, 'index'])->name('order.index');
//     Route::get('/order/', 'index')->name('order.index');
//     Route::get('/order/edit/{id}', 'edit')->name('order.edit');
//     Route::delete('/order/destroy/{id}', 'destroy')->name('order.destroy');
//     Route::put('/order/update/{id}', 'update')->name('order.update');
//     // Route::post('/orders', 'store');
// });

Route::group(['prefix' => 'order'], function () {
    Route::get('/', [OrderController::class, 'index'])->name('order.index');
    Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
    Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
    Route::delete('/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    Route::put('/update/{id}', [OrderController::class, 'update'])->name('order.update');
});

Route::group(['prefix' => 'offer'], function () {
    Route::get('/', [OfferController::class, 'index'])->name('offer.index');
    Route::get('/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
    Route::get('/show/{id}', [OfferController::class, 'show'])->name('offer.show');
    Route::delete('/destroy/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');
    Route::put('/update/{id}', [OfferController::class, 'update'])->name('offer.update');
});

Route::group(['prefix' => 'clients'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('client.index');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('client.show');
    Route::delete('/destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
    Route::put('/update/{id}', [ClientController::class, 'update'])->name('client.update');
});

Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::resource('user', UserController::class);
Route::resource('role', RoleController::class);
Route::resource('cars', CarsController::class);
Route::resource('car-types', CarTypesController::class);
Route::resource('class-list', ClassListController::class);
Route::resource('car-list', CarListController::class);

Route::post('/register-post', [AuthController::class, 'register'])->name('register_post');
Route::post('/login-post', [AuthController::class, 'login'])->name('login_post');

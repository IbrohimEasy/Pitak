<?php

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

Route::get('/', function () {
    return view('index');
})->name('dashboard');

Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerPage'])->name('register');
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginPage'])->name('login');
Route::resource('user', \App\Http\Controllers\UsersController::class);
Route::resource('role', \App\Http\Controllers\RoleController::class);
Route::resource('cars', \App\Http\Controllers\CarsController::class);
Route::resource('car-types', \App\Http\Controllers\CarTypesController::class);
Route::resource('class-list', \App\Http\Controllers\ClassListController::class);
Route::resource('car-list', \App\Http\Controllers\CarListController::class);

Route::post('/register-post', [\App\Http\Controllers\AuthController::class, 'register'])->name('register_post');
Route::post('/login-post', [\App\Http\Controllers\AuthController::class, 'login'])->name('login_post');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

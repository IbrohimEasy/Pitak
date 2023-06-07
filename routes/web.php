<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\CarTypesController;
use App\Http\Controllers\CarListController;

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


Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
Route::resource('user', UsersController::class);
Route::resource('role', RoleController::class);
Route::resource('cars', CarsController::class);
Route::resource('car-types', CarTypesController::class);
Route::resource('class-list', ClassListController::class);
Route::resource('car-list', CarListController::class);

Route::post('/register-post', [AuthController::class, 'register'])->name('register_post');
Route::post('/login-post', [AuthController::class, 'login'])->name('login_post');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

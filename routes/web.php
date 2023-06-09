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
use App\Http\Controllers\LanguageController;


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

Route::controller(OrderController::class)->group(function () {
    // Route::get('/', [OrderController, 'index'])->name('order.index');
    Route::get('/order/', 'index')->name('order.index');
    Route::get('/order/edit/{id}', 'edit')->name('order.edit');
    Route::delete('/order/destroy/{id}', 'destroy')->name('order.destroy');
    Route::put('/order/update/{id}', 'update')->name('order.update');
    // Route::post('/orders', 'store');
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


Route::group(['prefix' => 'language'], function () {

    Route::get('/', [LanguageController::class, 'index'])->name('language.index');
    Route::get('/language/show/{id}', [LanguageController::class, 'show'])->name('language.show');
    Route::post('/translation/save/', [LanguageController::class, 'translation_save'])->name('translation.save');
    Route::post('/language/change/', [LanguageController::class, 'changeLanguage'])->name('language.change');
    Route::post('/env_key_update', [LanguageController::class, 'env_key_update'])->name('env_key_update.update');
    Route::get('/language/create/', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('/language/added/', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('/language/edit/{id}', [LanguageController::class, 'languageEdit'])->name('language.edit');
    Route::post('/language/update/', [LanguageController::class, 'update'])->name('languages.update');
    Route::get('/language/delete/{id}', [LanguageController::class, 'languageDestroy'])->name('language.destroy');
    Route::post('/language/update/value', [LanguageController::class, 'updateValue'])->name('languages.update_value');
});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

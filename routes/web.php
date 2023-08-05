<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\CarTypesController;
use App\Http\Controllers\ColorsListController;
use App\Http\Controllers\CarListController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\CouponContoller;
use App\Http\Controllers\MediaHistoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ComplainController;


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



Auth::routes();

Route::post('phone', [UserController::class, 'loginPhone'])->name('loginPhone');
Route::post('token', [UserController::class, 'loginToken'])->name('loginToken');
Route::get('page-phone', [UserController::class, 'pagePhone'])->name('pagePhone');
Route::get('page-token/{id}', [UserController::class, 'pageToken'])->name('pageToken');

Route::group(['middleware'=>['is_auth']], function(){
    Route::get('/welcome', function () {
        return view('welcome');
    })->name('welcome');
});

Route::group(['middleware'=>['auth', 'language']], function(){
    Route::get('/', function () {
        return view('index');
    })->name('dashboard');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/settings', [UserController::class, 'settings'])->name('settings.index');
        Route::get('/account', [UserController::class, 'account'])->name('account');
    });

    Route::group(['prefix' => 'orders'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::get('/show/{id}', [OrderController::class, 'show'])->name('order.show');
        Route::delete('/destroy/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
        Route::put('/update/{id}', [OrderController::class, 'update'])->name('order.update');
        // for api 
        Route::get('/search/taxi', [OrderController::class, 'searchTaxi']);
        Route::get('/api/order/show', [OrderController::class, 'orderShow']);
    });

    Route::group(['prefix' => 'offers'], function () {
        Route::get('/', [OfferController::class, 'index'])->name('offer.index');
        Route::get('/edit/{id}', [OfferController::class, 'edit'])->name('offer.edit');
        Route::get('/show/{id}', [OfferController::class, 'show'])->name('offer.show');
        Route::delete('/destroy/{id}', [OfferController::class, 'destroy'])->name('offer.destroy');
        Route::put('/update/{id}', [OfferController::class, 'update'])->name('offer.update');
    });

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UsersController::class, 'index'])->name('users.index');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::get('/show/{id}', [UsersController::class, 'show'])->name('users.show');
        Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
        Route::put('/update/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::post('/confirm-dirver', [UsersController::class, 'confirmDirver'])->name('users.confirm-dirver');
    });

    Route::group(['prefix' => 'clients'], function () {
        Route::get('/', [ClientController::class, 'index'])->name('client.index');
        Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('client.edit');
        Route::get('/show/{id}', [ClientController::class, 'show'])->name('client.show');
        Route::delete('/destroy/{id}', [ClientController::class, 'destroy'])->name('client.destroy');
        Route::put('/update/{id}', [ClientController::class, 'update'])->name('client.update');
    });

    Route::group(['prefix' => 'drivers'], function () {
        Route::get('/', [DriverController::class, 'index'])->name('driver.index');
        Route::get('/edit/{id}', [DriverController::class, 'edit'])->name('driver.edit');
        Route::get('/show/{id}', [DriverController::class, 'show'])->name('driver.show');
        Route::delete('/destroy/{id}', [DriverController::class, 'destroy'])->name('driver.destroy');
        Route::put('/update/{id}', [DriverController::class, 'update'])->name('driver.update');
    });

    Route::resource('user', UserController::class);
    Route::resource('cars', CarsController::class);
    Route::resource('option', OptionsController::class);
    Route::resource('carTypes', CarTypesController::class);
    Route::resource('classList', ClassListController::class);
    Route::resource('colorList', ColorsListController::class);
    Route::resource('carList', CarListController::class);
    Route::resource('mediaHistory', MediaHistoryController::class);
    Route::resource('complain', ComplainController::class);

    Route::group(['prefix' => 'language'], function () {

        Route::get('/', [LanguageController::class, 'index'])->name('language.index');
        Route::get('/language/show/{id}', [LanguageController::class, 'show'])->name('language.show');
        Route::post('/translation/save/', [LanguageController::class, 'translation_save'])->name('translation.save');
        Route::post('/language/change/', [LanguageController::class, 'changeLanguage'])->name('language.change');
        Route::post('/env_key_update', [LanguageController::class, 'env_key_update'])->name('env_key_update.update');
        Route::get('/language/create/', [LanguageController::class, 'create'])->name('languages.create');
        Route::post('/language/added/', [LanguageController::class, 'store'])->name('languages.store');
        Route::get('/language/edit/{id}', [LanguageController::class, 'languageEdit'])->name('language.edit');
        Route::put('/language/update/{id}', [LanguageController::class, 'update'])->name('language.update');
        Route::delete('/language/delete/{id}', [LanguageController::class, 'languageDestroy'])->name('language.destroy');
        Route::post('/language/update/value', [LanguageController::class, 'updateValue'])->name('languages.update_value');
    });

    Route::group(['prefix' => 'coupon'], function () {
        Route::get('/', [CouponContoller::class, 'index'])->name('coupon.index');
        Route::get('create', [CouponContoller::class, 'create'])->name('coupon.create');
        Route::get('/edit/{id}', [CouponContoller::class, 'edit'])->name('coupon.edit');
        Route::put('/update/{id}', [CouponContoller::class, 'update'])->name('coupon.update');
        Route::delete('/destroy/{id}', [CouponContoller::class, 'destroy'])->name('coupon.destroy');
        Route::post('/store', [CouponContoller::class, 'store'])->name('coupon.store');
        // Route::get('/', [CouponContoller::class, 'index'])->name('coupon.create');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('create', [RoleController::class, 'create'])->name('role.create');
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('role.show');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::put('/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::delete('/destroy/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
        // Route::get('/', [RoleController::class, 'index'])->name('coupon.create');
    });

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TableController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[UserController::class, 'CheckAuthen'])->name('home');
Route::group(['prefix'=>'user','as'=>'user.'], function() {
    Route::get('/login',[UserController::class, 'Login'])->name('login');
    Route::post('/login',[UserController::class, 'Authen'])->name('authen');
    Route::get('/logout',[UserController::class, 'Logout'])->name('logout');
});
Route::group(['prefix'=>'store','as'=>'store.'], function() {
    Route::get('/',[StoreController::class, 'Main'])->name('main');
    Route::group(['prefix'=>'request','as'=>'request.'], function() {
        Route::get('/',[StoreController::class, 'ViewRequest'])->name('index');
        Route::get('/{id}',[StoreController::class, 'ShowRequest'])->name('show');
        Route::get('/create',[StoreController::class, 'NewRequest'])->name('create');
        Route::get('/addfood/{foodId}',[StoreController::class, 'AddFood'])->name('addfood');
        Route::post('/',[StoreController::class, 'SaveNewRequest'])->name('store');
        Route::get('/{request}/edit',[StoreController::class, 'EditRequest'])->name('edit');
        Route::put('/{request}',[StoreController::class, 'UpdateRequest'])->name('update');
        Route::delete('/{request}',[StoreController::class, 'DeleteRequest'])->name('destroy');
    });
    Route::resource('food', FoodController::class);
    Route::resource('table', TableController::class);
});

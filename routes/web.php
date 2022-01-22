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
Route::get('/',function(){
    return 'show all product';
})->name('home');
Route::get('/about',function(){
    return 'About Shop';
})->name('about');
Route::group(['prefix'=>'product','as'=>'product.'], function() {
    Route::get('/',function(){
        return 'All Product';
    })->name('index');
    Route::get('/create',function(){
        return 'Create New Product';
    })->name('create');
    Route::post('/',function(){
        return 'Store Product';
    })->name('store');
    Route::get('/{id}/edit',function($id){
        return 'Edit Product ID '.$id;
    })->name('edit');
    Route::put('/{id}',function($id){
        return 'Update Product ID '.$id;
    })->name('update');
    Route::delete('/{id}',function($id){
        return 'Delete Product ID '.$id;
    })->name('delete');
});
Route::group(['prefix'=>'user','as'=>'user.'], function() {
    Route::get('/login',function(){
        return 'View Login Page';
    })->name('login');
    Route::post('/login',function(){
        return 'Authentication';
    })->name('authen');
    Route::get('/logout',function(){
        return 'Logout and go to home';
    })->name('logout');
    Route::get('/',function(){
        return 'All User';
    })->name('index');
    Route::get('/create',function(){
        return 'Create New User';
    })->name('create');
    Route::post('/',function(){
        return 'Store User';
    })->name('store');
    Route::get('/{id}/edit',function($id){
        return 'Edit User ID '.$id;
    })->name('edit');
    Route::put('/{id}',function($id){
        return 'Update User ID '.$id;
    })->name('update');
    Route::delete('/{id}',function($id){
        return 'Delete User ID '.$id;
    })->name('delete');
});
// Route::get('/',[UserController::class, 'CheckAuthen'])->name('home');
// Route::resource('user', UserController::class);
// Route::group(['prefix'=>'user','as'=>'user.'], function() {
//     Route::get('/login',[UserController::class, 'Login'])->name('login');
//     Route::post('/login',[UserController::class, 'Authen'])->name('authen');
//     Route::get('/logout',[UserController::class, 'Logout'])->name('logout');
// });
// Route::group(['prefix'=>'store','as'=>'store.'], function() {
//     Route::get('/',[StoreController::class, 'Main'])->name('main');
//     // Route::group(['prefix'=>'request','as'=>'request.'], function() {
//     //     Route::get('/',[StoreController::class, 'ViewRequest'])->name('index');
//     //     Route::get('/{id}',[StoreController::class, 'ShowRequest'])->name('show');
//     //     Route::get('/create',[StoreController::class, 'NewRequest'])->name('create');
//     //     Route::get('/selecttable/{tableId}',[StoreController::class, 'SelectTable'])->name('selecttable');
//     //     Route::get('/addfood/{foodId}',[StoreController::class, 'AddFood'])->name('addfood');
//     //     Route::get('/checkout',[StoreController::class, 'SelectFood'])->name('selectfood');
//     //     Route::post('/',[StoreController::class, 'SaveNewRequest'])->name('store');
//     //     Route::get('/{request}/edit',[StoreController::class, 'EditRequest'])->name('edit');
//     //     Route::put('/{request}',[StoreController::class, 'UpdateRequest'])->name('update');
//     //     Route::delete('/{request}',[StoreController::class, 'DeleteRequest'])->name('destroy');
//     // });
//     Route::resource('food', FoodController::class);
//     Route::resource('table', TableController::class);
// });

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
Route::get('/',[StoreController::class,'Home'])->name('home');
Route::get('/about',[StoreController::class,'About'])->name('about');
Route::get('/showall',[StoreController::class,'ShowAll'])->name('showall');
Route::group(['prefix'=>'product','as'=>'product.'], function() {
    // Route::get('/',function(){
    //     return 'View All Product';
    // })->name('index');
    Route::get('/',[ProductController::class,'AllProduct'])->name('index');
    // Route::get('/create',function(){
    //     return 'Create Product Page';
    // })->name('index');
    Route::get('/create',[ProductController::class,'Create'])->name('create');
    // Route::post('/',function(){
    //     return 'Store Product';
    // })->name('store');
    Route::post('/',[ProductController::class,'Store'])->name('store');
    // Route::post('/{id}/edit',function(){
    //     return 'Edit Product Page';
    // })->name('edit');
    Route::get('/{id}/edit',[ProductController::class,'Edit'])->name('edit');
    // Route::put('/{id}',function($id){
    //     return 'Update Product ID '.$id;
    // })->name('update');
    Route::put('/{id}',[ProductController::class,'Update'])->name('update');
    // Route::delete('/{id}',function($id){
    //     return 'Delete Product ID '.$id;
    // })->name('destroy');
    Route::delete('/{id}',[ProductController::class,'Destroy'])->name('destroy');
});
Route::group(['prefix'=>'user','as'=>'user.'], function() {
    // init Route
    // Route::get('/login',function(){
    //     return 'View Login Page';
    // })->name('login');
    // Route::post('/login',function(){
    //     return 'Authentication';
    // })->name('authen');
    // Route::get('/logout',function(){
    //     return 'Logout and go to home';
    // })->name('logout');
    // Route::get('/',function(){
    //     return 'All User';
    // })->name('index');
    // Route::get('/create',function(){
    //     return 'Create New User';
    // })->name('create');
    // Route::post('/',function(){
    //     return 'Store User';
    // })->name('store');
    // Route::get('/{id}/edit',function($id){
    //     return 'Edit User ID '.$id;
    // })->name('edit');
    // Route::put('/{id}',function($id){
    //     return 'Update User ID '.$id;
    // })->name('update');
    // Route::delete('/{id}',function($id){
    //     return 'Delete User ID '.$id;
    // })->name('delete');

    Route::get('/login',[UserController::class,'Login'])->name('login');
    Route::post('/login',[UserController::class,'Authen'])->name('authen');
    Route::get('/logout',[UserController::class,'Logout'])->name('logout');
});

// Route::resource('user', UserController::class);

// Route::resource('user', UserController::class)->only([
//     'index','create','update','edit','destroy'
// ]);

Route::resource('user', UserController::class)->except(['show']);

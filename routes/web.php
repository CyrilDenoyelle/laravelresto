<?php

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

Route::get('/', function () {
    return redirect('/home');
});

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

// ADMIN
Route::get('/admin', 'ProductController@index')->name('storeAdmin');
Route::post('/product/create', 'ProductController@store')->name('storeProduct');
Route::get('/product/destroy/{id}', 'ProductController@destroy')->name('destroyProduct');
Route::get('/product/update/{id}', 'ProductController@update')->name('updateProduct');

// USERS
Route::get('/commande', 'OrderController@index')->name('order');
Route::post('/commande/create', 'OrderController@store')->name('storeOrder');



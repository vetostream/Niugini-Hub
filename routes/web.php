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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products/{id}', ['uses' => 'ProductsController@index']);
Route::get('/categories', 'CategoriesController@index');
Route::get('/stocks', 'StocksController@index');
Route::get('/orders', 'OrdersController@index');
Route::get('/profile', 'UserController@index');
Route::get('/admin', 'AdminController@index');

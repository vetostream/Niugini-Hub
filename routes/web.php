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

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{id}', ['uses' => 'ProductsController@details']);

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{id}', ['uses' => 'CategoriesController@details']);

Route::get('/stocks', 'StocksController@index');
Route::get('/orders', 'OrdersController@index');
Route::get('/profile', 'UserController@index');
Route::get('/admin', 'AdminController@index');

Route::post('/cart/post', 'CartController@add');
Route::get('/cart/count', 'CartController@count');
Route::get('/cart/retrieve', 'CartController@retrieve');
Route::post('/cart/delete', 'CartController@delete');
Route::get('/cart', 'CartController@index');
Route::post('/cart/update', 'CartController@update');
Route::post('/cart/qty', 'CartController@get_qty');

Route::get('/checkout', 'CheckoutController@index');
Route::post('stripe', 'CheckoutController@stripePost')->name('stripe.post');

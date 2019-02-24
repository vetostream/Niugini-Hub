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

Route::get('/user', 'UserController@index')->name('profile');
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('/user/update/password', 'UserController@updatePasswordForm')->name('updatePasswordForm');
Route::post('/user/update/password', 'UserController@updatePassword')->name('updatePassword');

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{id}', ['uses' => 'ProductsController@details']);

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{id}', ['uses' => 'CategoriesController@details']);

Route::get('/stocks', 'StocksController@index');
Route::get('/orders', 'OrdersController@index');
Route::get('/profile', 'UserController@index');

Route::post('/cart/post', 'CartController@add');
Route::get('/cart/count', 'CartController@count');
Route::get('/cart/retrieve', 'CartController@retrieve');
Route::post('/cart/delete', 'CartController@delete');
Route::get('/cart', 'CartController@index');
Route::post('/cart/update', 'CartController@update');
Route::post('/cart/qty', 'CartController@get_qty');

Route::get('/checkout', 'CheckoutController@index');
Route::post('stripe', 'CheckoutController@stripePost')->name('stripe.post');

Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');

Route::get('/admin/categories', 'AdminController@categoriesList')->middleware('is_admin')->name('adminCategoriesList');
Route::get('/admin/categories/{id}', ['uses' => 'AdminController@categoriesDetails'])->middleware('is_admin')->name('adminCategoriesDetails');
Route::get('/admin/create/categories', 'AdminController@categoriesCreateForm')->middleware('is_admin')->name('adminCategoriesCreateForm');
Route::post('/admin/create/categories', 'AdminController@storeCategories')->middleware('is_admin')->name('storeCategories');
Route::post('/admin/update/categories', 'AdminController@updateCategories')->middleware('is_admin')->name('updateCategories');
Route::get('/admin/delete/categories/{id}', ['uses' => 'AdminController@deleteCategories'])->middleware('is_admin')->name('deleteCategories');

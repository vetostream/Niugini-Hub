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
Route::get('/user/update', 'UserController@updateUserForm')->name('updateUserForm');
Route::post('/user/update', 'UserController@update')->name('updateUser');
Route::get('/user/update/password', 'UserController@updatePasswordForm')->name('updatePasswordForm');
Route::post('/user/update/password', 'UserController@updatePassword')->name('updatePassword');

Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{id}', ['uses' => 'ProductsController@details']);

Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{id}', ['uses' => 'CategoriesController@details']);

Route::get('/stocks', 'StocksController@index');
Route::get('/orders', 'OrdersController@index');
Route::get('/profile', 'UserController@index');

Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');

Route::get('/admin/categories', 'AdminController@categoriesList')->middleware('is_admin')->name('adminCategoriesList');
Route::get('/admin/categories/{id}', ['uses' => 'AdminController@categoriesDetails'])->middleware('is_admin')->name('adminCategoriesDetails');
Route::get('/admin/create/categories', 'AdminController@categoriesCreateForm')->middleware('is_admin')->name('adminCategoriesCreateForm');
Route::post('/admin/create/categories', 'AdminController@storeCategories')->middleware('is_admin')->name('storeCategories');
Route::post('/admin/update/categories', 'AdminController@updateCategories')->middleware('is_admin')->name('updateCategories');
Route::get('/admin/delete/categories/{id}', ['uses' => 'AdminController@deleteCategories'])->middleware('is_admin')->name('deleteCategories');

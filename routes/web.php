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

// User
Route::get('/user', 'UserController@index')->name('profile');
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);
Route::get('/user/update/password', 'UserController@updatePasswordForm')->name('updatePasswordForm');
Route::post('/user/update/password', 'UserController@updatePassword')->name('updatePassword');
Route::post('/user/update/address', 'UserController@updateAddress')->name('updateAddress');
Route::get('/user/deactivate', 'UserController@deactivateForm')->name('deactivateForm');
Route::POST('/user/deactivateAccount', 'UserController@deactivate')->name('deactivate');

// Sellers
Route::get('/sellers/apply/{id}', ['uses' => 'SellersController@apply']);
Route::get('/sellers/details/{id}', ['uses' => 'SellersController@details'])->name('sellersProfile');
Route::get('/sellers/list/{id}/products', ['uses' => 'SellersController@productsList'])->middleware('is_approved_seller')->name('sellersProductsList');
Route::get('/sellers/create/products', 'SellersController@productsCreateForm')->middleware('is_approved_seller')->name('productsCreateForm');
Route::post('/sellers/create/products', 'SellersController@storeSellersProducts')->middleware('is_approved_seller')->name('storeSellersProducts');

// Products
Route::get('/products', 'ProductsController@index')->name('products');
Route::get('/products/{id}', ['uses' => 'ProductsController@details'])->name('productsDetails');
Route::post('/search', 'ProductsController@search')->name('search');

// Categories
Route::get('/categories', 'CategoriesController@index')->name('categories');
Route::get('/categories/{id}', ['uses' => 'CategoriesController@details']);

Route::get('/stocks', 'StocksController@index');

// Orders
Route::get('/orders', 'OrdersController@index');
Route::get('/profile', 'UserController@index');

// Cart
Route::post('/cart/post', 'CartController@add');
Route::get('/cart/count', 'CartController@count');
Route::get('/cart/retrieve', 'CartController@retrieve');
Route::post('/cart/delete', 'CartController@delete');
Route::get('/cart', 'CartController@index');
Route::post('/cart/update', 'CartController@update');
Route::post('/cart/qty', 'CartController@get_qty');

Route::get('/checkout', 'CheckoutController@index');
Route::post('stripe', 'CheckoutController@stripePost')->name('stripe.post');

// Admin
Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');

Route::get('/admin/categories', 'AdminController@categoriesList')->middleware('is_admin')->name('adminCategoriesList');
Route::get('/admin/categories/{id}', ['uses' => 'AdminController@categoriesDetails'])->middleware('is_admin')->name('adminCategoriesDetails');
Route::get('/admin/create/categories', 'AdminController@categoriesCreateForm')->middleware('is_admin')->name('adminCategoriesCreateForm');
Route::post('/admin/create/categories', 'AdminController@storeCategories')->middleware('is_admin')->name('storeCategories');
Route::post('/admin/update/categories', 'AdminController@updateCategories')->middleware('is_admin')->name('updateCategories');
Route::get('/admin/delete/categories/{id}', ['uses' => 'AdminController@deleteCategories'])->middleware('is_admin')->name('deleteCategories');

Route::get('/admin/sellers', 'AdminController@sellersList')->middleware('is_admin')->name('adminSellersList');
Route::get('/admin/sellers/{id}', ['uses' => 'AdminController@sellersDetails'])->middleware('is_admin')->name('adminSellersDetails');
Route::post('/admin/update/sellers/status/{id}', ['uses' => 'AdminController@updateSellersStatus'])->middleware('is_admin')->name('adminUpdateSellersStatus');

Route::get('/admin/products', 'AdminController@productsList')->middleware('is_admin')->name('adminProductsList');
Route::get('/admin/products/{id}', ['uses' => 'AdminController@productsDetails'])->middleware('is_admin')->name('adminProductsDetails');
Route::post('/admin/update/products/status/{id}', ['uses' => 'AdminController@updateProductsStatus'])->middleware('is_admin')->name('adminUpdateProductsStatus');

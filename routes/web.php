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

Route::get('/', 'UserController@welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');
Route::resource('stock', 'StockController');
Route::resource('order', 'OrderController');
Route::post('add/order/stock', 'UserController@addOrder');
Route::post('remove/order/stock', 'UserController@removeOrder');
Route::get('/motorcycles', 'StockController@getMotor');
Route::get('/parts', 'StockController@getParts');
Route::get('/cart', 'HomeController@cart')->name('cart');

Route::get('/billing', 'TransactionController@billingIndex');
Route::get('/billing/edit/{id}', 'TransactionController@billingEdit');
Route::post('/billing/edit/{id}', 'TransactionController@billingUpdate');
Route::get('/transactions', 'OrderController@transactions');
Route::get('/transaction-report', 'OrderController@transactionReport')->name('transaction.report');

Route::post('/billing/discount', 'TransactionController@billingDiscount');
Route::get('/get/search', 'StockController@getClick');
Route::post('/add/comment', 'StockController@addComment');
Route::post('/add/delete', 'StockController@deleteComment');

Route::get('/statement-of-account/{id}', 'TransactionController@fucked')->name('tadow');

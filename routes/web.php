<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/item/{price}/{id}', 'HomeController@addToCheckout');
Route::get('/checkout', 'CheckoutController@index');
Route::post('/midtrans', 'MidtransController@pay');
Route::post('/delete/{id}/{checkout_id}', 'CheckoutController@coba');

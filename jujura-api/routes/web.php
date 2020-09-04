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

Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'HomeController@register')->name('register');

Route::get('/product', 'HomeController@product')->name('product');
Route::post('/product', 'HomeController@product')->name('product');

Route::get('/sales/list', 'HomeController@salesList')->name('sales.list');
Route::post('/sales/list', 'HomeController@salesList')->name('sales.list');

Route::get('/sales/insert', 'HomeController@salesInsert')->name('sales.insert');
Route::post('/sales/insert', 'HomeController@salesInsert')->name('sales.insert');
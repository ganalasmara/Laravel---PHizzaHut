<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//I MADE GANAL ASMARA JAYA - 2201799386

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'PizzaController@index');
Route::post('/','PizzaController@search')->name('search');

Route::middleware(['admin'])->group(function () {
    Route::get('/pizza/add', 'PizzaController@add');
    Route::get('/pizza/delete/{id}','PizzaController@delete')->name('delete');
    Route::post('/pizza/insert', 'PizzaController@insert')->name('insert');
    Route::get('/pizza/edit/{id}','PizzaController@edit');
    Route::post('/pizza/edit/{id}','PizzaController@update')->name('update');
    Route::get('/users', 'UserController@all')->name('admin.alluser');
    Route::get('/transactions','TransactionController@all')->name('admin.alltrans');
});

Route::middleware(['member'])->group(function () {
    Route::get('/cart','CartController@index');
    Route::post('/cart/update/{cart_id}/{pizza_id}','CartController@update')->name('cart.update');
    Route::get('/cart/delete/{cart_id}/{pizza_id}','CartController@delete')->name('cart.delete');
    Route::get('/checkout/{cart_id}','CartController@checkout')->name('checkout');
    Route::get('/history','TransactionController@index');
    Route::get('/history/{trans_id}','TransactionController@detail')->name('trans.details');
});

Route::get('/pizza/{id}', 'PizzaController@show');
Route::post('/pizza/{id}', 'CartController@add')->name('add');











// Route::post('/pizza/{id}','CartController@save');
Auth::routes();

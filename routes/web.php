<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/pizza/add', 'PizzaController@add');

Route::get('/pizza/delete/{id}','PizzaController@delete')->name('delete');

Route::post('/pizza/insert', 'PizzaController@insert')->name('insert');

Route::get('/pizza/edit/{id}','PizzaController@edit');
Route::post('/pizza/edit/{id}','PizzaController@update')->name('update');

Route::get('/pizza/{id}', 'PizzaController@show');
Route::post('/pizza/{id}', 'CartController@add')->name('add');

// Route::post('/pizza/{id}','CartController@save');
Auth::routes();

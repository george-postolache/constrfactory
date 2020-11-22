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
    return view('home');
});
Route::get('/products', 'App\Http\Controllers\ProductsController@index');
Route::post('/products','App\Http\Controllers\ProductsController@store');
Route::get('/products/{id}/delete','App\Http\Controllers\ProductsController@destroy');
Route::get('/products/{id}/edit','App\Http\Controllers\ProductsController@edit');
Route::put('/products/updated','App\Http\Controllers\ProductsController@update');

Route::get('/providers', 'App\Http\Controllers\ProvidersController@index');
Route::post('/providers','App\Http\Controllers\ProvidersController@store');
Route::get('/providers/{id}/delete','App\Http\Controllers\ProvidersController@destroy');
Route::get('/providers/{id}/edit','App\Http\Controllers\ProvidersController@edit');
Route::put('/providers/updated','App\Http\Controllers\ProvidersController@update');

Route::get('/contracts', 'App\Http\Controllers\ContractsController@index');
Route::post('/contracts','App\Http\Controllers\ContractsController@store');
Route::get('/contracts/{id}/delete','App\Http\Controllers\ContractsController@destroy');
Route::get('/contracts/{id}/edit','App\Http\Controllers\ContractsController@edit');
Route::put('/contracts/updated','App\Http\Controllers\ContractsController@update');

Route::get('/logs', 'App\Http\Controllers\LogsController@index');
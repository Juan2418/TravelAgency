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

Route::get('/cities','App\Http\Controllers\CityController@index');
Route::get('/cities/create','App\Http\Controllers\CityController@create');
Route::get('/cities/{city}/edit','App\Http\Controllers\CityController@edit');
Route::post('/cities','App\Http\Controllers\CityController@store');
Route::put('/cities/{city}','App\Http\Controllers\CityController@update');


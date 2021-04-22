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
Route::get('/cities', 'App\Http\Controllers\CityController@index')->name('cities.index');
Route::get('/cities/create', 'App\Http\Controllers\CityController@create');
Route::get('/cities/{city}/edit', 'App\Http\Controllers\CityController@edit');
Route::post('/cities', 'App\Http\Controllers\CityController@store');
Route::put('/cities/{city}', 'App\Http\Controllers\CityController@update');
Route::get('/cities/{city}/delete', 'App\Http\Controllers\CityController@delete');

Route::get('/flights/ByDeparture', 'App\Http\Controllers\FlightController@indexByDeparture')
    ->name('flights.indexByDeparture');
Route::get('/flights', 'App\Http\Controllers\FlightController@index')
    ->name('flights.index');
Route::get('/flights/select-airline', 'App\Http\Controllers\FlightController@selectAirline')
    ->name('flights.select-airline');
Route::get('/flights/create', 'App\Http\Controllers\FlightController@create')
    ->name('flights.create');
Route::post('/flights', 'App\Http\Controllers\FlightController@store');
Route::get('/flights/{flight}/edit', 'App\Http\Controllers\FlightController@edit')
    ->name('flights.edit');
Route::put('/flights/{flight}', 'App\Http\Controllers\FlightController@update');
Route::delete('/flights/{flight}', 'App\Http\Controllers\FlightController@delete');

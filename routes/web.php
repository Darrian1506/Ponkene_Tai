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

Route::view('/', 'home.index')->name('inicio');

/*INSUMOS*/

Route::get('/insumos','InsumoController@index')->name('insumo.index');
Route::get('/insumos/agregar-insumo','InsumoController@create')->name('insumo.create');
Route::post('insumos','InsumoController@store')->name('insumo.store');
Route::get('/insumos/{insumo}/edit','InsumoController@edit')->name('insumo.edit');
Route::put('/insumos/{insumo}','InsumoController@update')->name('insumo.update');
Route::delete('/insumos/{insumo}','InsumoController@destroy')->name('insumo.destroy');

/*EMPLEADOS*/

Route::view('/empleados','empleado.login')->name('empleado.login-form');
Route::post('/empleados/login','EmpleadoController@login')->name('empleado.login');
Route::get('/empleados/index','EmpleadoController@index')->name('empleado.index');
Route::get('/empleados/logout','EmpleadoController@logout')->name('empleado.logout');
Route::get('/empleados/agregar-empleado','EmpleadoController@create')->name('empleado.create');
Route::post('empleados','EmpleadoController@store')->name('empleado.store');
Route::delete('/empleados/{empleado}','EmpleadoController@destroy')->name('empleado.destroy');
Route::get('/empleados/{empleado}/edit','EmpleadoController@edit')->name('empleado.edit');
Route::put('/empleados/{empleado}','EmpleadoController@update')->name('empleado.update');

/*PLATOS*/

Route::get('/platos/index','PlatoController@index')->name('plato.index');
Route::get('/platos/agregar-plato','PlatoController@create')->name('plato.create');
Route::post('/platos','PlatoController@store')->name('plato.store');
Route::delete('/platos/{plato}','PlatoController@destroy')->name('plato.destroy');
Route::get('/platos/{plato}/edit','PlatoController@edit')->name('plato.edit');
Route::put('/platos/{plato}','PlatoController@update')->name('plato.update');

/*RESERVA*/

Route::get('/reserva/index','ReservaController@index')->name('reserva.index');
Route::get('/reserva/crear-reserva','ReservaController@create')->name('reserva.create');
Route::post('/reserva','ReservaController@store')->name('reserva.store');
//Route::delete('/platos/{plato}','App\Http\Controllers\PlatoController@destroy')->name('plato.destroy');
//Route::get('/reserva/{plato}/edit','App\Http\Controllers\PlatoController@edit')->name('plato.edit');
Route::put('/reserva/{reserva}/{estado}','ReservaController@update')->name('reserva.update');

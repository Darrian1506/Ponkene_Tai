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

Route::get('/insumos','App\Http\Controllers\InsumoController@index')->name('insumo.index');
Route::get('/insumos/agregar-insumo','App\Http\Controllers\InsumoController@create')->name('insumo.create');
Route::post('insumos','App\Http\Controllers\InsumoController@store')->name('insumo.store');

Route::view('/empleados','empleado.login')->name('empleado.login-form');
/*EMPLEADOS*/
Route::post('/empleados/login','App\Http\Controllers\EmpleadoController@login')->name('empleado.login');
Route::get('/empleados/index','App\Http\Controllers\EmpleadoController@index')->name('empleado.index');
Route::get('/empleados/logout','App\Http\Controllers\EmpleadoController@logout')->name('empleado.logout');
Route::get('/empleados/agregar-empleado','App\Http\Controllers\EmpleadoController@create')->name('empleado.create');
Route::post('empleados','App\Http\Controllers\EmpleadoController@store')->name('empleado.store');
Route::delete('/empleados/{empleado}','App\Http\Controllers\EmpleadoController@destroy')->name('empleado.destroy');
Route::get('/empleados/{empleado}/edit','App\Http\Controllers\EmpleadoController@edit')->name('empleado.edit');
Route::put('/empleados/{empleado}','App\Http\Controllers\EmpleadoController@update')->name('empleado.update');

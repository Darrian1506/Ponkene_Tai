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
Route::get('/insumos/{insumo}/edit','App\Http\Controllers\InsumoController@edit')->name('insumo.edit');
Route::put('/insumos/{insumo}','App\Http\Controllers\InsumoController@update')->name('insumo.update');
Route::delete('/insumos/{insumo}','App\Http\Controllers\InsumoController@destroy')->name('insumo.destroy');



/*EMPLEADOS*/
Route::view('/empleados','empleado.login')->name('empleado.login-form');
Route::post('/empleados/login','App\Http\Controllers\EmpleadoController@login')->name('empleado.login');
Route::get('/empleados/index','App\Http\Controllers\EmpleadoController@index')->name('empleado.index');
Route::get('/empleados/logout','App\Http\Controllers\EmpleadoController@logout')->name('empleado.logout');
Route::get('/empleados/agregar-empleado','App\Http\Controllers\EmpleadoController@create')->name('empleado.create');
Route::post('empleados','App\Http\Controllers\EmpleadoController@store')->name('empleado.store');
Route::delete('/empleados/{empleado}','App\Http\Controllers\EmpleadoController@destroy')->name('empleado.destroy');
Route::get('/empleados/{empleado}/edit','App\Http\Controllers\EmpleadoController@edit')->name('empleado.edit');
Route::put('/empleados/{empleado}','App\Http\Controllers\EmpleadoController@update')->name('empleado.update');

/*PLATOS*/
Route::get('/platos','App\Http\Controllers\PlatoController@index')->name('plato.index');
Route::get('/platos/agregar-empleado','App\Http\Controllers\PlatoController@create')->name('plato.create');
Route::post('/platos','App\Http\Controllers\PlatoController@store')->name('plato.store');
Route::delete('/platos/{plato}','App\Http\Controllers\PlatoController@destroy')->name('plato.destroy');
Route::get('/platos/{plato}/edit','App\Http\Controllers\PlatoController@edit')->name('plato.edit');
Route::put('/platos/{plato}','App\Http\Controllers\PlatoController@update')->name('plato.update');

/*¨PROMOCIONES*/
Route::get('/promociones','App\Http\Controllers\PromocionController@index')->name('promocion.index');
Route::get('/promociones/agregar-promocion','App\Http\Controllers\PromocionController@create')->name('promocion.create');
Route::post('/promociones','App\Http\Controllers\PromocionController@store')->name('promocion.store');
Route::delete('/promociones/{promocion}','App\Http\Controllers\PromocionController@destroy')->name('promocion.destroy');
Route::get('/promociones/{promocion}/edit','App\Http\Controllers\PromocionController@edit')->name('promocion.edit');
Route::put('/promociones/{promocion}','App\Http\Controllers\PromocionController@update')->name('promocion.update');
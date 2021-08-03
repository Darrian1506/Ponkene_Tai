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
Route::get('/platos','PlatoController@index')->name('plato.index');
Route::get('/platos/agregar-empleado','PlatoController@create')->name('plato.create');
Route::post('/platos','PlatoController@store')->name('plato.store');
Route::delete('/platos/{plato}','PlatoController@destroy')->name('plato.destroy');
Route::get('/platos/{plato}/edit','PlatoController@edit')->name('plato.edit');
Route::put('/platos/{plato}','PlatoController@update')->name('plato.update');

/*¨PROMOCIONES*/
Route::get('/promociones','PromocionController@index')->name('promocion.index');
Route::get('/promociones/agregar-promocion','PromocionController@create')->name('promocion.create');
Route::post('/promociones','PromocionController@store')->name('promocion.store');
Route::delete('/promociones/{promocion}','PromocionController@destroy')->name('promocion.destroy');
Route::get('/promociones/{promocion}/edit','PromocionController@edit')->name('promocion.edit');
Route::put('/promociones/{promocion}','PromocionController@update')->name('promocion.update');

/*RESERVA*/

Route::get('/reserva/index','ReservaController@index')->name('reserva.index');
Route::get('/reserva/crear-reserva','ReservaController@create')->name('reserva.create');
Route::post('/reserva','ReservaController@store')->name('reserva.store');
//Route::get('/reserva/{plato}/edit','App\Http\Controllers\PlatoController@edit')->name('plato.edit');
Route::put('/reserva/{reserva}/{estado}','ReservaController@update')->name('reserva.update');


/*MESA*/

Route::get('/mesas/index','MesaController@index')->name('mesa.index');
Route::get('/mesas/agregar_mesa','MesaController@create')->name('mesa.create');
Route::post('/mesas','MesaController@store')->name('mesa.store');
Route::get('/mesas/{mesa}/edit','MesaController@edit')->name('mesa.edit');
Route::put('/mesas/{mesa}','MesaController@update')->name('mesa.update');
Route::delete('/mesas/{mesa}','MesaController@destroy')->name('mesa.destroy');


/*COMANDA*/

Route::get('/comandas/cocina','CocinaController@index')->name('cocina.index');

/*RESGISTRO DE HORA*/

//Route::get('/reserva/index','ReservaController@index')->name('reserva.index');
Route::get('/registroHora/create','RegistroHoraController@create')->name('registroHora.create');
Route::post('/registroHora','RegistroHoraController@store')->name('registroHora.store');
//Route::get('/reserva/{plato}/edit','App\Http\Controllers\PlatoController@edit')->name('plato.edit');
//Route::put('/reserva/{reserva}/{estado}','ReservaController@update')->name('reserva.update');

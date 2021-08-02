<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\InsumoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\ComandaController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/loginapi', [EmpleadoController::class, 'loginApi']);

Route::get('/reserva/index', [ReservaController::class, 'indexApi']);

Route::get('/insumo/{categoria}/index', [InsumoController::class, 'indexApi']);

Route::get('/promocion/index', [PromocionController::class, 'indexApi']);

Route::get('/platos/{plato}',[PlatoController::class, 'editApi']);

Route::get('/plato/index', [PlatoController::class, 'indexApi']);

Route::post('/comanda',[ComandaController::class, 'storeApi']);

Route::group(['middlware' => 'auth:api'], function(){
    Route::get('/reserva/pruebaApi', [ReservaController::class, 'pruebaApi']);
});
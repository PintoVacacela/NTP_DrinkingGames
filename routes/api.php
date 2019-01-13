<?php

use Illuminate\Http\Request;

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
//header('Access-Control-Allow-Origin: *');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/agregarjugador','jugadoresDP@agregarJugador');
Route::put('/editarjugador','jugadoresDP@editarJugador');
Route::delete('/eliminarjugador/{id}','jugadoresDP@eliminarJugador');
Route::get('/consultarjugadores','jugadoresDP@consultarJugadores');
Route::get('/juegoCascada','cartasDP@cascada');
Route::get('/getpuntaje/{juego}', 'puntajesDP@getTop5');
Route::get('/prue','cartasDP@prueba');
Route::get('/dados','dadosDP@index');

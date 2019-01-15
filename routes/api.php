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
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type, X-Auth-Token, Origin, Authorization');
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
Route::put('/editarPuntaje','puntajesDP@editarPuntaje');
Route::post('/setgiro/{valor}','ruletaDP@setGiro');
Route::get('/getgiro', 'ruletaDP@getGiro');
Route::get('/getgiros', 'ruletaDP@getGiros');
Route::get('/getpin', 'ruletaDP@getPin');
Route::post('/ruleta/{id}','ruletaDP@pin');
Route::post('/addcolores','ruletaDP@setColores');
Route::post('/addcartas','cartasDP@agregarCartas');
Route::post('/addreglas','cartasDP@agregarReglas');
Route::post('/addreglasjuego','cartasDP@agregarReglasJuegos');
Route::get('/dadosdesorden','dadosDP@obtJugador');



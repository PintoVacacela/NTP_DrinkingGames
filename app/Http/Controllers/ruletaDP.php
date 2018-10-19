<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ruletaDP extends Controller
{

    function retornarUsuario($id){
         $jugador = leaderboard :: where ("id",$id);
          return $jugador;
    }
    function actualizarPuntaje(Request $request,$id){
        $usuario = leaderboard::find($id);
        $puntuacion = $usuario->puntaje;
        $usuario->puntaje = $puntuacion;
        $usuario->save();
    }
    function calcularPuntuacion(){

    }
}

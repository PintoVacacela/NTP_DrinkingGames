<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ruletaDP extends Controller
{
    var $valor=0;

    function retornarUsuario($id){
         $jugador = leaderboard :: where ("id",$id);
          return $jugador;
    }
    function actualizarPuntaje(Request $request,$id)
    {
        $usuario = leaderboard::find($id);
        $temp = $request->input('boton');
        $puntuacion = $usuario->puntaje;
        if($temp == 'yes')
        {
            $puntuacion += this()->$valor;
            $usuario->puntaje = $puntuacion;
            $usuario->save();
        }
    }
}

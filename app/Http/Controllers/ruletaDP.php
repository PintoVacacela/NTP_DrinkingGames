<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ruleta;
//use App\puntajes;
class ruletaDP extends Controller
{
    function retornarUsuario($id){
        $jugador = ruleta:: where ("id",$id);
        return $jugador;
    }
    function actualizarPuntaje(Request $request,$id)
    {
        $valor=25;
        $ruleta = new ruleta;
        $puntaje = new puntaje;
        $usuario = puntaje::find($id);
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
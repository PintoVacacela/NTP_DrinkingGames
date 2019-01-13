<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ruleta;

//use App\puntajes;
class ruletaDP extends Controller
{
    public $giro = false;
    public $pin;

    function retornarUsuario($id)
    {
        $jugador = ruleta:: where("id", $id);
        return $jugador;
    }

    function setGiro($valor)
    {
        $giro = $valor;
        return Array('success' => $valor);
    }
    function getGiro(){
        if (isset($giro)) {
            return Array('giro' => $giro);
        }
        else
            return Array('success' => false);
    }
    function actualizarPuntaje(Request $request, $id)
    {
        $valor = 25;
        $ruleta = new ruleta;
        $puntaje = new puntaje;
        $usuario = puntaje::find($id);
        $temp = $request->input('boton');
        $puntuacion = $usuario->puntaje;
        if ($temp == 'yes') {
            $puntuacion += this()->$valor;
            $usuario->puntaje = $puntuacion;
            $usuario->save();
        }
    }
    function pin ($id){
        $pin = $id;
        if (isset($pin)) {
            return Array('pin' => $pin);
        }
        else
            return Array('success' => false);
    }
}
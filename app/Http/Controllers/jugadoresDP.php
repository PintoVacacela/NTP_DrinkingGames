<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jugador;

class jugadoresDP extends Controller
{
    //
    function agregarJugador(Request $request){
        $jugador = new jugador();
        $jugador->id = 0;
        $jugador->nombre = $request->input('nombre');
        $jugador->apellido = $request->input('apellido');
        $jugador->fechaNac = $request->input('fechaNac');
        $jugador->apodo = $request->input('apodo');
        $jugador->save();
        return true;
    }
    function editarJugador(Request $request){
        $jugador = \App\jugador::find($request->input('apodo'));
        $jugador->nombre = $request->input('nombre');
        $jugador->apellido = $request->input('apellido');
        $jugador->fechaNac = $request->input('fechaNac');
        $jugador->save();
        if ($jugador)
            return true;
        else
            return false;
    }
    function eliminarJugador(Request $request){
        $jugador = \App\jugador::find($request->input('apodo'));
        if($jugador)
            $result = \App\jugadoresMD::table('jugadores')->where('apodo','=',$request->input('apodo'));
        else
            $error = 'Oye, el jugador no existe!';
        if ($result)
            $r = true;
        else
            $r = array('success' => false, 'error'=> $error);
        return $r;
    }
    function consultarJugadores(){
        $jugadores = Array('data'=>\App\jugador::all());
        /*foreach ($jugadores as $row)
        {
            $nombre = $row->nombre;
            $apellido = $row->apellido;
            $apodo = $row->apodo;
            $fechaNac = $row->fechaNac;

            $arr = array("nombre"=> $nombre,"apellido"=>$apellido,
                "apodo"=>$apodo, 'fechaNac'=> $fechaNac);
            $resultado[] = $arr;
        }*/
        $resultado = json_encode($jugadores);
        return $resultado;
    }
}

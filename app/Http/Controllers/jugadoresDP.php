<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\jugador;
use App\puntaje;
use PhpParser\Node\Expr\Array_;


class jugadoresDP extends Controller
{
    //
    function agregarJugador(Request $request){
        $jugador = new jugador;
        //$jugador->id = 0;
        $jugador->nombre = $request->input('nombre');
        $jugador->apellido = $request->input('apellido');
        $jugador->fechaNac = $request->input('fechaNac');
        $jugador->apodo = $request->input('apodo');
        $jugador->save();
        return Array('result'=>$jugador);
        $this->agregarPuntaje($request->input('apodo'));

    }
    function agregarPuntaje($apodo){
        $jugador = jugador::select('id')->where('apodo',$apodo)->get();
        //echo $jugador;
        $puntaje = new puntaje;
        //$puntaje->id = 0;
        $puntaje->id_jugador = $jugador[0]->id;
        $puntaje->puntajes_cartas = 0;
        $puntaje->puntajes_dados = 0;
        $puntaje->puntajes_ruleta = 0;
        $puntaje->save();
        return Array('result'=>$puntaje);
    }
    function editarJugador(Request $request){
        $time = strtotime($request->input('fechaNac'));

        $newformat = date('Y-m-d',$time);
        $jugador = \App\jugador::find($request->input('apodo'));
        $jugador->nombre = $request->input('nombre');
        $jugador->apellido = $request->input('apellido');
        $jugador->fechaNac = $newformat;
        $jugador->save();
        if ($jugador)
            return true;
        else
            return false;
    }
    function eliminarJugador($id){
        $jugador = \App\jugador::findOrFail($id);
        $jugador->delete();
        return Array("success"=>true);
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

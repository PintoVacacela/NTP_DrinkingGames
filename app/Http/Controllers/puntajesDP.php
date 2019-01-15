<?php

namespace App\Http\Controllers;
use App\puntaje;
use Illuminate\Http\Request;

class puntajesDP extends Controller
{
    //
    public function getTop5($juego){
        switch ($juego){
            case 'cartas':
                $resultado = puntaje::select('puntajes_cartas', 'jugadores.apodo')
                    ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                    ->orderBy('puntajes_cartas', 'desc')
                    ->limit(5)
                    ->get();
                break;
            case 'dados':
                $resultado = puntaje::select('puntajes_dados', 'jugadores.apodo')
                ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                ->orderBy('puntajes_dados', 'desc')
                ->limit(5)
                ->get();
                break;
            case 'ruleta':
                $resultado = puntaje::select('puntajes_ruleta', 'jugadores.apodo')
                    ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                    ->orderBy('puntajes_ruleta', 'desc')
                    ->limit(5)
                    ->get();
                break;
        }
        return Array('data'=>$resultado);
    }
    public function getTopScore($juego)
    {
        switch ($juego) {
            case 'cartas':
                $resultado = puntaje::select('puntajes_cartas', 'jugadores.apodo')
                    ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                    ->orderBy('puntajes_cartas', 'desc')
                    ->limit(1)
                    ->get();
                break;
            case 'dados':
                $resultado = puntaje::select('puntajes_dados', 'jugadores.apodo')
                    ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                    ->orderBy('puntajes_dados', 'desc')
                    ->limit(1)
                    ->get();
                break;
            case 'ruleta':
                $resultado = puntaje::select('puntajes_ruleta', 'jugadores.apodo')
                    ->join('jugadores', 'jugadores.id', '=', 'puntajes.id_jugador')
                    ->orderBy('puntajes_ruleta', 'desc')
                    ->limit(1)
                    ->get();
                break;
        }
        return Array('data' => $resultado);
    }
    /*function agregarPuntaje(Request $request){
        $puntaje = new puntaje;
        $puntaje->id = 0;
        $puntaje->id_jugador = $request->input('id_jugador');
        $puntaje->puntajes_cartas = $request->input('puntajes_cartas');
        $puntaje->puntajes_dados = $request->input('puntajes_dados');
        $puntaje->puntajes_ruleta = $request->input('puntajes_ruleta');
        $puntaje->save();
        return Array('result'=>$puntaje);
    }*/
    function modificarPuntaje(Request $request)
    {
        $puntaje = \App\puntaje::find($request->input('id_jugador'));
        $puntaje->nombre = $request->input('puntajes_cartas');
        $puntaje->apellido = $request->input('puntajes_dados');
        $puntaje->fechaNac = $request->input('puntajes_ruleta');
        $puntaje->save();
        if ($puntaje)
            return true;
        else
            return false;
    }

}

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
    public function getTopScoreCartas(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_cartas, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_cartas', 'desc')
            ->limit(1)
            ->get();
        foreach ($puntajes as $row)
        {
            $nombre = $row->apodo;
            $cartas = $row->puntaje_cartas;

            $arr = array("nombre"=>$nombre,"cartas"=>$cartas);
            $resultado[] = $arr;
        }
        return array('data' => $resultado);
    }
    public function getTopScoreDados(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_dados, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_dados', 'desc')
            ->limit(1)
            ->get();
        foreach ($puntajes as $row)
        {
            $nombre = $row->apodo;
            $cartas = $row->puntaje_dados;

            $arr = array("nombre"=>$nombre,"cartas"=>$cartas);
            $resultado[] = $arr;
        }
        return array('data' => $resultado);
    }
    public function getTopScoreRuleta(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_ruleta, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_ruleta', 'desc')
            ->limit(1)
            ->get();
        foreach ($puntajes as $row)
        {
            $nombre = $row->apodo;
            $cartas = $row->puntaje_ruleta;

            $arr = array("nombre"=>$nombre,"cartas"=>$cartas);
            $resultado[] = $arr;
        }
        return array('data' => $resultado);
    }
}

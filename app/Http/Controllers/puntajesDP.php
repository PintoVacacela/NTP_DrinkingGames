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
}

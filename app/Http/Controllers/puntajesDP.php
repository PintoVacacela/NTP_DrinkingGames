<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class puntajesDP extends Controller
{
    //
    public function getAll(){
        $puntajes = \App\puntajesMD::table('puntajes')
        ->select('puntaje_cartas, puntaje_dados, puntaje_ruleta, jugadores.apodo')
        ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
        ->get();
        foreach ($puntajes as $row)
        {
            $nombre = $row->apodo;
            $cartas = $row->puntaje_cartas;
            $dados = $row->puntaje_dados;
            $ruleta = $row->puntaje_ruleta;

            $arr = array("nombre"=>$nombre,"cartas"=>$cartas,"dados"=>$dados,"ruleta"=>$ruleta);
            $resultado[] = $arr;
        }
        return array('data' => $resultado);
    }
    public function getTop5Cartas(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_cartas, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_cartas', 'desc')
            ->limit(5)
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
    public function getTop5Dados(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_dados, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_dados', 'desc')
            ->limit(5)
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
    public function getTop5Ruleta(){
        $puntajes = \App\puntajesMD::table('puntajes')
            ->select('puntaje_ruleta, jugadores.apodo')
            ->join('jugadores', 'jugadores.id_jugadores', '=', 'puntajes.id_jugadores')
            ->orderBy('puntaje_ruleta', 'desc')
            ->limit(5)
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

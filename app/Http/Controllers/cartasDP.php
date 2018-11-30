<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cartas;

class cartasDP extends Controller
{


    function cascada()
    {
        $jugdores= \App\jugador::all();
        $num=count($jugdores);
        $cartasJugador=array(array());

        $cartas=$this->traerCartas();
        $cartasDesordenadas=$this->desordenarCartas($cartas);

        $reglas=array();
        for($i=0;$i<count($cartasDesordenadas);$i++)
        {
             $reglas[$i]=$this->obtenerRegla($cartasDesordenadas[$i]->id_cartas);

        }
        //$reglas  = json_encode($reglas);
        return $reglas;
    }


    function consultarCartas(){
        $carta = Array('cartas'=>\App\cartas::all());

        $resultado = $carta;
        return $resultado;
    }

    function obtenerRegla($id_carta)
    {

        $reglas_x_juegos=Array('reglas_x_juegos'=>\App\reglas_x_juegos::all());
        $reglas=Array('reglas'=>\App\reglas::all());


        for($i=0;$i<count($reglas_x_juegos);$i++)
        {


            if($id_carta==$reglas_x_juegos[$i]->id_juego)
            {

                for($j=0;$j<count($reglas);$j++)
                {
                    if($reglas_x_juegos[$i]->id_reglas==$reglas[$j]->id_reglas)
                        $regla=$reglas[$j]->descripcion;
                }

            }


        }

        return $regla;
    }

    function desordenarCartas($cartas)
    {

        $indice=0;
        $aux[]=null;
        $count=0;
        while($count<count($cartas))
        {
            $num1=rand($indice,count($cartas)-1);
            if(!in_array($num1,$aux))
            {

                $aux[$count]=$num1;
                $arr[$count]=$cartas[$num1];
                $count++;
            }
        }
        return $arr;
    }


    function traerCartas()
    {
        $res = \App\cartas::all();
        return $res;

    }

    function ingresarRegla( Request $r)
    {

        $regla=$r->input('regla');
        $idCarta=$r->input('idCarta');
        ChullaVida::table('reglas')->insert( $regla );

        $idRegla=ChullaVida::table('reglas')->where ('descripcion',$regla);
        ChullaVida::table('reglas_x_juegos')->insert($idRegla,$idCarta);

    }
    function borrarRegla(Request $r)
    {
        $idRegla=$r->input('idRegla');
        ChullaVida::table('reglas')->where('id_reglas',$idRegla)->delete();
        ChullaVida::table('reglas_x_juegos')->where('id_reglas',$idRegla)->delete();

    }
    function editarRegla(Request $r)
    {
        $idRegla=$r->input('idRegla');
        $regla=$r->input('regla');
        ChullaVida::table('reglas')->where('id_reglas',$idRegla)->update('descripcion',$regla);
    }
    function verReglas()
    {
        $reglas=ChullaVida::table('reglas')->get();

        foreach($reglas as $row)
        {
            $id_Reglas[]=$row->id_Reglas;
            $descripcion[]=$row->descripcion;

        }
        return $descripcion();

    }



}

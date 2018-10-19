<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cartasDP extends Controller
{


    function cascada($numJugadores)
    {
        $cartasJugador=array(array());

        $cartas=traerCartas();
        $count=0;
        $count2=0;
        $cartasDesordenadas=$this->desordenarCartas($cartas);
        for($i=0;$i<count($cartasDesordenadas);$i++)
        {
             if($count=$numJugadores-1)
             {
                 $count=0;
                 $count2++;
             }

             $cartasJugador[$count][$count2]=$cartasDesordenadas[$i];
             obtenerRegla($cartasDesordenadas[$i][0]);
             $count++;
        }


    }

    function obtenerRegla($idCarta)
    {
        $registro=ChullaVida::table('reglas_x_juegos')->where('id_juego',$idCarta);
        $regla=ChullaVida::table('reglas')->where('id_reglas',$registro[0]);
        return $regla[1];
    }

    function desordenarCartas($cartas)
    {
        $indice=0;
        $aux[]=null;
        $count=0;
        while($count<count($cartas[$indice]))
        {
            $num1=rand($indice,count($cartas[$indice])-1);
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
        $cartas=ChullaVida::table('cartas')->get();
        foreach($cartas as $row)
        {
            $id_cartas[]=$row->id_cartas;
            $numero[]=$row->numero;
            $palo[]=$row->palo;
            $imagen[]=$row->imagen ;

        }

        $arr=array('id_cartas'=>$id_cartas,'numero'=>$numero,'palo'=>$palo,'imagen'=>$imagen);
        return $arr;

    }

    function ingresarRegla( $regla,$idCarta)
    {
        ChullaVida::table('reglas')->insert( $regla );

        $idRegla=ChullaVida::table('reglas')->where ('descripcion',$regla);
        ChullaVida::table('reglas_x_juegos')->insert($idRegla,$idCarta);

    }
    function borrarRegla($idRegla)
    {
        ChullaVida::table('reglas')->where('id_reglas',$idRegla)->delete();
        ChullaVida::table('reglas_x_juegos')->where('id_reglas',$idRegla)->delete();

    }
    function editarRegla($idRegla,$regla)
    {
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

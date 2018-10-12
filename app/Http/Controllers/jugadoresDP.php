<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jugadoresDP extends Controller
{
    //
    function agregarJugador($nombre, $apellido, $fechaNac, $apodo){
        $jugadormd = new jugadorMD();
        if(!$jugadormd->verificarJugador($apodo))
            $result = $jugadormd->saveJugador($nombre, $apellido, $fechaNac, $apodo);
        else
            $error = 'Oye, el jugador ya existe!';
        if ($result)
            $r = array('success' => true);
        else
            $r = array('success' => false, 'error'=> $error);
        return $r;
    }
    function editarJugador($nombre, $apellido, $fechaNac, $apodo){
        $jugadormd = new jugadorMD();
        if($jugadormd->verificarJugador($apodo))
            $result = $jugadormd->updateJugador($nombre, $apellido, $fechaNac, $apodo);
        else
            $error = 'Oye, el jugador no existe!';
        if ($result)
            $r = array('success' => true);
        else
            $r = array('success' => false, 'error'=> $error);
        return $r;
    }
    function eliminarJugador($apodo){
        $jugadormd = new jugadorMD();
        if($jugadormd->verificarJugador($apodo))
            $result = $jugadormd->deleteJugador($apodo);
        else
            $error = 'Oye, el jugador no existe!';
        if ($result)
            $r = array('success' => true);
        else
            $r = array('success' => false, 'error'=> $error);
        return $r;
    }
    function consultarJugadores(){
        $jugadormd = new jugadorMD();
        $result = $jugadormd->getAll();
        if (!empty($result))
            $r = array('success' => true);
        else
            $r = array('success' => false, 'error'=> 'Hubo un error');
        return $r;
    }
}

<?php

namespace App\Http\Controllers;

use App\reglas;
use App\reglas_x_juegos;
use Illuminate\Http\Request;
use App\ruleta;
use App\giro;
use App\colores_x_regla;

//use App\puntajes;
class ruletaDP extends Controller
{
    public $pin;

    function retornarUsuario($id)
    {
        $jugador = ruleta:: where("id", $id);
        return $jugador;
    }

    function setGiro($valor)
    {
        $giro = new giro;
        $giro->valor = $valor;
        $giro->save();
        return Array('data' => $valor);
    }
    function getGiro(){
        $resul = giro::select("valor")->orderBy('id', 'desc')->limit(1)
                ->get();
        if ($resul)
            return $resul;
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
    function getGiros(){
        $giro = Array('data'=>giro::all());
        $resultado = json_encode($giro);
        return $resultado;
    }
    function pin ($id){
        $giroId = giro::select("id")->orderBy('id', 'desc')->limit(1)
            ->get();
        $giroPin = giro::where('id', $giroId[0]->id)
            ->update(['pin' => $id]);
        if ($giroPin)
            return Array("success"=>true, "id"=>$giroId);
        else
            return Array("success" => false);

    }
    function getPin(){
        $pin = giro::select("pin")->orderBy('id', 'desc')->limit(1)
            ->get();
        $resul = colores_x_regla::select("reglas.descripcion")
            ->join('reglas', 'reglas.id', '=', 'colores_x_regla.id_regla')
        ->where("colores_x_regla.id_pin", $pin[0]["pin"])->get();
        if ($resul)
            return Array("data" => $resul);
        else
            return Array('success' => false);
    }
    function setColores(Request $request){
        $ruleta = new ruleta;
        $ruleta->color_led = $request->input('color_led');
        $ruleta->pin = $request->input('pin');
        $ruleta->save();
        return Array('result'=>$ruleta);
    }
    function setReglasColores(Request $request){
        $ruletareglas = new colores_x_regla;
        $ruletareglas->id_regla = $request->input('id_regla');
        $ruletareglas->id_pin = $request->input('id_pin');
        $ruletareglas->save();
        return Array('result'=>$ruletareglas);
    }
}
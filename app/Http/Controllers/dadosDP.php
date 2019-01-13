<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dados;

class dadosDP extends Controller
{
    function desordenarDados($dados)
    {
        $aux=count($dados)-1;
        $count=0;
        $arr[0]=null;
        while($count<=$aux)
        {
            $num1=rand(0,$aux);
            if(!in_array($num1,$arr))
            {
                $arr[$count]=$num1;
                $count++;
            }
        }
        return $arr;
    }

    function obtenerRegla($id_dado)
    {
        $reglas_x_juegos=\App\reglas_x_juegos::all();
        $reglas=\App\reglas::all();
        $cont=null;
        $regla=null;
        $aux=null;
        for($i=0;$i<count($reglas_x_juegos);$i++)
        {
            if($id_dado==$reglas_x_juegos[$i]->id_juego)
            {
                $cont=$reglas_x_juegos[$i]->id_reglas;
                for($j=0;$j<count($reglas);$j++)
                {
                    if($reglas[$j]->id==$cont)
                    {
                        $aux=$reglas[$j];
                    }
                }
            }
        }
        return $aux;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = dados::all();
        //print_r($dados);
        return response()->json($dados, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = new dados();
        $dados->nombre = $request->input('nombre');
        $dados->image = $request->input('imagen');
        $dados->save();
        echo json_encode($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function show(dados $dados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function edit(dados $dados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dados $dados)
    {
        $dados = \App\reglas::all();
        return $dados;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dados)
    {
        $dados = dados::find($id_dados);
        $dados->delete();
    }
}


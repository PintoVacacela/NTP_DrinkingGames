<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dados = Dados::get();
        echo json_encode($dados);
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
        $dados = new Dados();
        $dados->nombre = $request->input('nombre');
        $dados->image = $request->input('imagen');
        $dados->save();
        echo json_encode($dados);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function show(Dados $dados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function edit(Dados $dados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dados $dados)
    {
        $dados = \App\reglas::all();
        return $dados;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dados  $dados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dados)
    {
        $dados = Dados::find($id_dados);
        $dados->delete();
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Verificar se este usuário já tem um time cadastrado, caso tenha, redirecionar para a página do time
        return view('times/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $times = Time::all();
        $nomes_times = array();
        for($i=0; $i<count($times); $i++){
            array_push($nomes_times, $times[$i]->nome);
        } 
        for($j=0; $j<count($nomes_times); $j++){
            if($nomes_times[$j] == $request->nome){
                echo "Nomes iguais";
            } 
        }
        
        $nome_existe = "Já existe um time com este nome";
        $ultimo_request_nome            = $request->nome;
        $ultimo_request_frase           = $request->frase;
        $ultimo_request_descricao       = $request->descricao;
        $ultimo_request_facebook        = $request->facebook;
        $ultimo_request_instagram       = $request->instagram;
        $ultimo_request_gamersclub      = $request->gamersclub;
        $ultimo_request_faceit          = $request->faceit;
        $ultimo_request_steam           = $request->steam;
        $ultimo_request_twitter         = $request->twitter;
        $ultimo_request_twitch          = $request->twitch;
        $ultimo_request_email           = $request->email;
        return redirect('time/create')->with(
            [
                'nome_existe'=> $nome_existe, 
                'ultimo_request_nome'           => $ultimo_request_nome,
                'ultimo_request_frase'          =>$ultimo_request_frase,
                'ultimo_request_descricao'      =>$ultimo_request_descricao, 
                'ultimo_request_facebook'       =>$ultimo_request_facebook, 
                'ultimo_request_instagram'      =>$ultimo_request_instagram, 
                'ultimo_request_gamersclub'     =>$ultimo_request_gamersclub, 
                'ultimo_request_faceit'         =>$ultimo_request_faceit, 
                'ultimo_request_steam'          =>$ultimo_request_steam, 
                'ultimo_request_twitter'        =>$ultimo_request_twitter, 
                'ultimo_request_twitch'         =>$ultimo_request_twitch, 
                'ultimo_request_email'          =>$ultimo_request_email,             
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function edit(Time $time)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Time $time)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function destroy(Time $time)
    {
        //
    }
}

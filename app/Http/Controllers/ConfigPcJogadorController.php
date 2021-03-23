<?php

namespace App\Http\Controllers;

use App\Models\ConfigPcJogador;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\validateConfigPcUsuario;





class ConfigPcJogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("jogador/createpc");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(validateConfigPcUsuario $request)
    {
        $request['id_jogador'] = Auth::id();
        $request['caminho_imagem_pc_jogador'] = null;
        ConfigPcJogador::create($request->all());        
        $mensagem = "Configuração  de Computador Salva com sucesso!";//Mudar mensagem
        return redirect("configpcjogador/create")->with('mensagem',  $mensagem);//Redirecionar para a página de criar configuração de cs
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function show(ConfigPcJogador $configPcJogador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPcJogador $configPcJogador)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConfigPcJogador $configPcJogador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConfigPcJogador $configPcJogador)
    {
        //
    }
}

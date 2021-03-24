<?php

namespace App\Http\Controllers;

use App\Models\ConfigPcJogador;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\validateConfigPcUsuario;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImagemPcJogadorController;
use App\Models\Jogador;

class ConfigPcJogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('jogador');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $congfiguração_computador = DB::table('config_pc_jogadors')
            ->where('id_jogador', Auth::id())
            ->first();//buscando se o jogador já cadastrou algum computador
        if ($congfiguração_computador) {//Se tiver cadastrado, mostrar a pagina de show jogador
            $mensagem = "Voce já tem uma configuração de computador cadastrada!";
            return redirect('jogador/' . Auth::id())->with('mensagem', $mensagem);
        }
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
        if(count($request->files) > 0){
            $cria_imagem = new ImagemPcJogadorController();
            $upload = $cria_imagem->salvandoImagem($request->imagem_pc_jogador);
            $request["caminho_imagem_pc_jogador"] = $upload;
        }
        else{
            $request["caminho_imagem_pc_jogador"] = null; //Se nao tiver imagem
        }

        $request['id_jogador'] = Auth::id(); //Colocando id do jogador        
        ConfigPcJogador::create($request->all());
        $mensagem = "Configuração  de Computador Salva com sucesso!"; //Mudar mensagem
        return redirect("configpcjogador/create")->with('mensagem',  $mensagem); //Redirecionar para a página de criar configuração de cs

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function show($configPcJogador)
    {
        return redirect('jogador/'.$configPcJogador);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function edit(ConfigPcJogador $configPcJogador)
    {
        return redirect('jogador/'.Auth::id().'/edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    public function update(validateConfigPcUsuario $request, ConfigPcJogador $configPcJogador)
    {
        ConfigPcJogador::where('id_jogador', Auth::id())->update([
            "monitor"       => $request->monitor,
            "teclado"       => $request->teclado,
            "mouse"         => $request->mouse,
            "mousepad"      => $request->mousepad,
            "processador"   => $request->processador,
            "placa_mae"     => $request->placa_mae,
            "placa_de_video"=> $request->placa_de_video,
            "memoria_ram"   => $request->memoria_ram,
            "fonte"         => $request->fonte,
            "gabinete"      => $request->gabinete,
        ]);
        $mensagem = "Configuração de computador salva com sucesso!";
        return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConfigPcJogador  $configPcJogador
     * @return \Illuminate\Http\Response
     */
    /*public function destroy(ConfigPcJogador $configPcJogador)
    {
        //
    }*/
}

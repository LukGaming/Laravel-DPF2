<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateJogador;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Jogador;
use App\Models\ConfigPcJogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ImagePerifilJogadorController;
use App\Http\Controllers\ConfigPcJogadorController;


class JogadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jogador/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //É obrigatório estar logado para acessar essa rota!
    {
        $jogador = DB::table('jogadors')
            ->where('user_id', Auth::id())
            ->first();
        if ($jogador) {
            $mensagem = "Voce já possui um perfil de jogador!";
            return redirect('jogador/' . Auth::id())->with('mensagem', $mensagem);
        }
        return view('jogador/create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateJogador $request) //É obrigatório estar logado 
    {
        if (count($request->files) > 0) { //Salvando imagem do usuário
            $cria_imagem = new ImagePerifilJogadorController();
            $upload = $cria_imagem->salvandoImagem($request->imagem_perfil_jogador);
            $request['caminho_imagem_perfil_jogador'] = $upload;
        } else {
            $request['caminho_imagem_perfil_jogador'] = null;
        }
        Jogador::create([
            'nick_jogador' => $request->nick_jogador,
            'frase_perfil' => $request->frase_perfil,
            'descricao_perfil_jogador' => $request->descricao_perfil_jogador,
            'funcao_primaria' => $request->funcao_primaria,
            'funcao_secundaria' => $request->funcao_secundaria,
            'funcao_adicional' => $request->funcao_adicional,
            'ativo' => 1,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'gamersclub' => $request->gamersclub,
            'faceit' => $request->faceit,
            'twitter' => $request->twitter,
            'steam' => $request->steam,
            'twitch' => $request->twitch,
            'email_contato' => $request->email_contato,
            'updated_at' => Carbon::now(),
            'user_id' => Auth::Id(),
            'created_at' => Carbon::now(),
            'updated_at' => null,
            "caminho_imagem_perfil_jogador" => $request['caminho_imagem_perfil_jogador']
        ]);
        $mensagem = "Perfil criado com sucesso, agora cadastre dados de seu computador opcionalmente";
        return redirect('configpcjogador/create')->with('mensagem', $mensagem);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function show($id_jogador) //Não é obrigatório estar logado para acessar essa rota!!!!
    {
        $jogador = DB::table('jogadors')
            ->where('user_id', $id_jogador)
            ->first();


        $config_pc_jogador = DB::table('config_pc_jogadors')
            ->where('id_jogador', Auth::id())
            ->first();
        if ($jogador) {
            $string = $jogador->descricao_perfil_jogador;
            $count_espacos = 0;
            $texto_array = explode(" ", $string);
            $conta = 0;

            for ($i = 0; $i < count($texto_array); $i++) {
                if ($i > 7 && $i % 8 == 0) {
                    $texto_array[$i] = $texto_array[$i] . "\r\n";
                }
            }
            $nova_string = implode("+", $texto_array);
            $nova_string = str_replace("+", " ", $nova_string);
            $jogador->descricao_perfil_jogador = $nova_string;
        }
        if ($jogador) {
            return view('jogador/show', ['jogador' => $jogador, 'config_pc_jogador'=>$config_pc_jogador]); //Se existir um jogador
        } else {
            $mensagem = "Este jogador não está cadastrado em nosso sistema";
            return view('jogador/show', ['jogador' => $jogador]);
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function edit($id_jogador)
    {
        if ($id_jogador == Auth::id()) {
            $config_pc_jogador = DB::table('config_pc_jogadors')
                ->where('id_jogador', Auth::id())
                ->first();



            $jogador = DB::table('jogadors')
                ->where('user_id', Auth::id())
                ->first();
            if ($jogador) {
                return view('jogador/edit', ['jogador' => $jogador, 'config_pc_jogador' => $config_pc_jogador]);
            } else {
                $mensagem = "Voce ainda não tem um perfil de jogador para ser editado, crie um aqui";
                return redirect('jogador/create')->with('mensagem', $mensagem);
            }
        } else {
            $mensagem = "Voce não tem permissão para acessar essa rota!";
            return redirect('/jogador')->with('mensagem', $mensagem);
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateJogador $request)
    {
        Jogador::where('user_id', Auth::id())->update([
            'nick_jogador' => $request->nick_jogador,
            'frase_perfil' => $request->frase_perfil,
            'descricao_perfil_jogador' => $request->descricao_perfil_jogador,
            'funcao_primaria' => $request->funcao_primaria,
            'funcao_secundaria' => $request->funcao_secundaria,
            'funcao_adicional' => $request->funcao_adicional,
            'ativo' => 1,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'gamersclub' => $request->gamersclub,
            'faceit' => $request->faceit,
            'twitter' => $request->twitter,
            'steam' => $request->steam,
            'twitch' => $request->twitch,
            'email_contato' => $request->email_contato,
            'updated_at' => Carbon::now()
        ]);
        $mensagem = "Perfil editado com sucesso!";
        return redirect('jogador/' . Auth::id())->with('mensagem', $mensagem);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogador  $jogador
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_jogador)
    {
        if ($id_jogador == Auth::id()) {
            ConfigPcJogador::where('id_jogador', $id_jogador)->delete(); //Primeiro eu removo a configuração
            Jogador::where('user_id', $id_jogador)->delete(); //Depois eu removo o perfil

            $mensagem = "Perfil de jogador excluido com sucesso!";
            return redirect('/jogador')->with('mensagem', $mensagem);
        } else {
            $mensagem = "Voce não tem permissão para acessar essa rota!";
            return redirect('/jogador')->with('mensagem', $mensagem);
        }
    }
    public function verificaUsuarioLogado()
    {
        //Verificando se usuário está logado
        if (Auth::user()) {
            return true;
        } else {
            return false;
        }
    }
    static function VerificaSeUsuarioTemJogador()
    {
        $usuario_logado = (new JogadorController())->verificaUsuarioLogado();
        if ($usuario_logado) {
            $jogador = DB::table('jogadors')
                ->where('user_id', Auth::id())
                ->first();
            if ($jogador) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

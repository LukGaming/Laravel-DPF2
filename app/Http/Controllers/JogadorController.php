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
use App\Models\configCsJogador;
use App\Models\jogadoresParticipantesTime;
use App\Models\Time;



class JogadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'search', 'index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Verificando se este jogador faz parte de algum time
        return view('jogador/index', ['tem_jogador' => $this->verificaSeUsuarioTemPerfilJogadorCriado()]);
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

        $jogador = DB::table('jogadors') //Buscando dados do jogador
            ->where('user_id', $id_jogador)
            ->first();

        $config_pc_jogador = DB::table('config_pc_jogadors') //Buscando dados do computador do jogador
            ->where('id_jogador', $id_jogador)
            ->first();

        $config_cs_jogador = DB::table('config_cs_jogadors') //Buscando dados do computador do jogador
            ->where('id_jogador', $id_jogador)
            ->first();
        if ($jogador) {
            //Verificar se este jogador já faz parte de um time futuramente


            //Verificar se eu sou dono de um  time
            $tenho_time = Time::where('user_id', Auth::id())->first();
            if ($tenho_time) {
                $convidar_jogador = 1;
                //Verificando se este jogador já faz parte de algum time
                $jogador_time = jogadoresParticipantesTime::where('id_jogador', $jogador->user_id)->first();
                if ($jogador_time) {
                    $este_jogador_tem_time = 1;
                } else {
                    $convidar_jogador = 1;
                    $este_jogador_tem_time = 0;
                }
            } else {
                $convidar_jogador = 0;
                $este_jogador_tem_time = 0;
            }
            return view('jogador/show', ['jogador' => $jogador, 'config_pc_jogador' => $config_pc_jogador, 'config_cs_jogador' => $config_cs_jogador, 'convidar_jogador' => $convidar_jogador ,'participa_de_time'=>$este_jogador_tem_time]); //Se existir um jogador
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
            $jogador = DB::table('jogadors')
                ->where('user_id', Auth::id())
                ->first();
            if ($jogador) {
                $config_pc_jogador = DB::table('config_pc_jogadors')
                    ->where('id_jogador', Auth::id())
                    ->first();
                $config_cs_jogador = DB::table('config_cs_jogadors') //Buscando dados do computador do jogador
                    ->where('id_jogador', $id_jogador)
                    ->first();
                return view('jogador/edit', ['jogador' => $jogador, 'config_pc_jogador' => $config_pc_jogador, 'config_cs_jogador' => $config_cs_jogador]);
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
            configCsJogador::where('id_jogador', $id_jogador)->delete();
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
    public function search()
    {
        return view('jogador/search-jogador');
    }
    public function verificaSeUsuarioTemPerfilJogadorCriado()
    {
        $verifica_se_tem_jogador_criado = Jogador::where('user_id', Auth::id())->first();
        if ($verifica_se_tem_jogador_criado) {
            return 1;
        } else {
            return 0;
        }
    }
    public function verificaSeJogadorFazParteDeAlgumTime()
    {
        if ($this->verificaSeUsuarioTemPerfilJogadorCriado()) { //verificando se este jogador tem time
            //$time_jogador = Time::where('user_id')
            //Fazer essa funcao quando fizermos os jogadores de times
        } else {
            return 0;
        }
    }
    public function convites()
    {
        return view('jogador/convites');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationOfTeam;
use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $times = Time::all();//Pegando todos os times no banco de dados
        for($i=0; $i<count($times);$i++){//Para cada um dos times irei verificar se este usuário criou o time
            if($times[$i]->user_id == Auth::id()){//Caso tenha criado o time, redirecionar para a página do time
                $mensagem = "Voce já possui um time!";
                return redirect('time/'. $times[$i]->id)->with('mensagem', $mensagem);
            }
        }
        return view('times/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidationOfTeam $request)
    {
        /*Verificando se existe algum time com este nome*/
        $times = Time::all();     //Buscando todos os times   
        $nomes_times = array(); //Criando um array para colocar todos os nomes de times
        $count = 0;//Bandeira Flag para caso encontre algum time com este nome
        for ($i = 0; $i < count($times); $i++) {//Looping para adicionar os nomes dos times no array
            array_push($nomes_times, $times[$i]->nome);
        }
        for ($j = 0; $j < count($nomes_times); $j++) {//Percorrendo nomes para ver se existe algum igual
            if ($nomes_times[$j] == $request->nome) {
                $count++;//Caso algum seja igual, a flag vai aparecer
            }
        }
        if ($count > 0) {//Caso a flag apareca, redirecionar para a página de criação com os mesmos dados
                            //Avisando que existe um time com este nome.
            $nome_existe = "Já existe um time com este nome";
            $ultimo_request_nome            = $request->nome;//Passando tudo que veio do request de volta para a sessão
            $ultimo_request_frase           = $request->frase;//Para que o usuário já fique com os campos preenchidos
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
                    'nome_existe' => $nome_existe,
                    'ultimo_request_nome'           => $ultimo_request_nome,
                    'ultimo_request_frase'          => $ultimo_request_frase,
                    'ultimo_request_descricao'      => $ultimo_request_descricao,
                    'ultimo_request_facebook'       => $ultimo_request_facebook,
                    'ultimo_request_instagram'      => $ultimo_request_instagram,
                    'ultimo_request_gamersclub'     => $ultimo_request_gamersclub,
                    'ultimo_request_faceit'         => $ultimo_request_faceit,
                    'ultimo_request_steam'          => $ultimo_request_steam,
                    'ultimo_request_twitter'        => $ultimo_request_twitter,
                    'ultimo_request_twitch'         => $ultimo_request_twitch,
                    'ultimo_request_email'          => $ultimo_request_email,
                ]
            );
        }
        $request['user_id'] = Auth::id();//Pegando id do usuário para armazenar no banco de dados
        $time = Time::create($request->all());//Armazenando dados do request no banco de dados
        $id_time = $time->id;//Pegando qual foi o id do time criado.
        $mensagem = "Time criado com sucesso!";//Mensagem para aparecer na página de show
        return redirect('time/'.$id_time)->with('mensagem', $mensagem);//Redirecionando para a página de show, 
    }                                                                   //com o id do time recem criado

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Time  $time
     * @return \Illuminate\Http\Response
     */
    public function show(Time $time)
    {
        if($time->user_id == Auth::id()){
            $time_admin = 1;
            
        }
        else{
            $time_admin = 0;
        }
        return view('times/show', ['time'=>$time, 'time_admin'=>$time_admin]);
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

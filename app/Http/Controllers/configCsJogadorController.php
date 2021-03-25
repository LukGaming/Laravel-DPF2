<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateconfigcs;
use App\Models\configCsJogador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class configCsJogadorController extends Controller
{
    public function create()
    {
        return view('jogador/createconfigCsJogador');
    }
    public function store(validateconfigcs $request)
    {
        $request['id_jogador'] = Auth::id();
        if (configCsJogador::create($request->all())) {
            $mensagem = "Cadastro de Jogador completo!";
            return redirect('jogador/'. Auth::id())->with('mensagem', $mensagem);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\validateconfigcs;
use App\Models\configCsJogador;
use Facade\FlareClient\Http\Response;
use Illuminate\Foundation\Console\StorageLinkCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class configCsJogadorController extends Controller
{
    public function create()
    {
        return view('jogador/createconfigCsJogador');
    }
    public function store(validateconfigcs $request)
    {
        $request['id_jogador'] = Auth::id();
        if (empty($request->files)) {
            $request["caminho_cfg"] = null;
        } else {
            $upload = $this->salvandoCfg($request);
            $request["caminho_cfg"] = $upload;
        }
        if (configCsJogador::create($request->all())) {
            $mensagem = "Cadastro de Jogador completo!";
            return redirect('jogador/' . Auth::id())->with('mensagem', $mensagem);
        }
    }
    public function salvandoCfg($request)
    {
        $path = 'images/jogador/cfg';
        if ($request->cfg) {
            //Preciso salvar na public como .cfg
            $upload = $request->cfg->storeAs($path, "jogador" . Auth::id() . ".cfg");
            //dd($upload); //Adicionando Imagem no disco
            $request->cfg->move(public_path($path), $upload);
            //Movendo para diretório publico
            return $upload;
        }
    }
    public function update(Request $request)
    {
        //dd($request);
        $request['id_jogador'] = Auth::id();
        configCsJogador::where('id_jogador', Auth::id())->update([
            "resolucao" => $request->resolucao,
            "sensibilidade" => $request->sensibilidade,
            "crosshair" => $request->crosshair,
            "viewmodel" => $request->viewmodel,
            "id_jogador" => Auth::id()
        ]);
        $mensagem = "Configuração de jogo Alterada com sucesso!";
        return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
    }
    public function removercfgjogador()
    {
        //Fazendo update no banco de dados para NULL
        $config_cs_jogador = configCsJogador::where('id_jogador', Auth::id())->first();
        $caminho_cfg_para_deletar = $config_cs_jogador->caminho_cfg;
        //dd($config_cs_jogador->caminho_cfg);
        Storage::delete($caminho_cfg_para_deletar);
        if (file_exists($caminho_cfg_para_deletar)) {
            unlink($caminho_cfg_para_deletar);
        }
        configCsJogador::where('id_jogador', Auth::id())->update([
            "caminho_cfg" => null
        ]);
        $mensagem = "Cfg removida com sucesso!";
        return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
    }
    public function adicionarcfgjogador(Request $request)
    {
        $caminho_cfg = $this->salvandoCfg($request);
        $request['id_jogador'] = Auth::id();
        configCsJogador::where('id_jogador', Auth::id())->update([
            "caminho_cfg" => $caminho_cfg
        ]);
        $mensagem = "Cfg Adicionada com sucesso!";
        return redirect('jogador/' . Auth::id() . "/edit")->with('mensagem', $mensagem);
    }
    public function editarcfgjogador(Request $request)
    {
        //Removendo Cfg Antiga
        $config_cs_jogador = configCsJogador::where('id_jogador', Auth::id())->first();
        $caminho_cfg_para_deletar = $config_cs_jogador->caminho_cfg;
        //dd($config_cs_jogador->caminho_cfg);
        Storage::delete($caminho_cfg_para_deletar);
        if (file_exists($caminho_cfg_para_deletar)) {
            unlink($caminho_cfg_para_deletar);
        }
        $caminho_cfg = $this->salvandoCfg($request);
        $request['id_jogador'] = Auth::id();
        configCsJogador::where('id_jogador', Auth::id())->update([
            "caminho_cfg" => $caminho_cfg
        ]);
        $mensagem = "Cfg Editada com sucesso!";
        return redirect('jogador/' . Auth::id() . "/edit")->with('mensagem', $mensagem);
    }
    public function downloadcfg($id_jogador)
    {
        $filename = "images/jogador/cfg/jogador" . $id_jogador . ".cfg";
        if (file_exists($filename)) {
            return Response()->download($filename);
        }
    }
}

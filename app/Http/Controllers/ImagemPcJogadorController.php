<?php

namespace App\Http\Controllers;

use App\Models\ConfigPcJogador;
use App\Models\Jogador;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;


class ImagemPcJogadorController extends Controller
{
    public function salvandoImagem($imagem)
    {
        $path = 'images/jogador/configPcJogador';
        $upload = $imagem->store($path);
        $imagem->move(public_path($path), $upload);
        return $upload;
    }
    public function removerImagem()
    {
        //Pegando caminho da imagem para ser removido
        $jogador = DB::table('config_pc_jogadors')
            ->where('id_jogador', Auth::user()->id)
            ->first();
        $filename = $jogador->caminho_imagem_pc_jogador;
        if (file_exists($filename)) { //Removendo Foto antiga do disco
            unlink($filename);
            Storage::delete($filename);
        }
        ConfigPcJogador::where('id_jogador', Auth::id())->update([
            "caminho_imagem_pc_jogador" => null,
            'updated_at' => Carbon::now()
        ]);
        $mensagem = "Imagem  Removida Com sucesso!";
        return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
    }
    public function editarImagem(Request $request)
    {
        if ($request->image) {
            //Remover Imagem Antiga
            $jogador = DB::table('config_pc_jogadors')
                ->where('id_jogador', Auth::user()->id)
                ->first();
            $filename = $jogador->caminho_imagem_pc_jogador;
            if (file_exists($filename)) {
                unlink($filename);
                Storage::delete($filename);
            }

            $path = 'images/jogador/configPcJogador';
            $upload = $request->image->store($path); //Adicionando Imagem no disco
            $request->image->move(public_path($path), $upload); //Movendo para diretório publico

            ConfigPcJogador::where('id_jogador', Auth::id())->update([ //Mudando no banco de dados o caminho da imagem
                "caminho_imagem_pc_jogador" => $upload,
                'updated_at' => Carbon::now()
            ]);
            $mensagem = "Imagem de computador editada com sucesso!";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        } else {
            $mensagem = "Nenhuma Imagem de computador Selecionada";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        }
    }
    public function adicionandoImagem(Request $request)
    {
        if ($request->image) {
            //$this->removerFoto();//Removendo Foto antiga
            $path = 'images/jogador/configPcJogador';
            $upload = $request->image->store($path);
            $request->image->move(public_path($path), $upload);
            //Mudando no banco de dados o caminho da imagem
            ConfigPcJogador::where('id_jogador', Auth::id())->update([
                "caminho_imagem_pc_jogador" => $upload,
                'updated_at' => Carbon::now()
            ]);
            $mensagem = "Imagem  adicionada com sucesso!";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        }
    }
}

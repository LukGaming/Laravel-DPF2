<?php

namespace App\Http\Controllers;

use App\Models\Jogador;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class ImagePerifilJogadorController extends Controller
{
    public function salvandoImagem($imagem)
    {
        $upload = $imagem->store('images/jogador');
        $imagem->move(public_path('images/jogador'), $upload);
        return $upload;
    }
    public function removerImagem()
    {
        //Pegando caminho da imagem para ser removido
        $jogador = DB::table('jogadors')
            ->where('user_id', Auth::user()->id)
            ->first();
        $filename = $jogador->caminho_imagem_perfil_jogador; //Pegando caminho da foto
        Storage::delete($filename); //Removendo Foto antiga
        Jogador::where('user_id', Auth::id())->update([
            "caminho_imagem_perfil_jogador" => null,
            'updated_at' => Carbon::now()
        ]);
        $mensagem = "Imagem  Removida Com sucesso!";
        return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
    }
    public function editarImagem(Request $request)
    {
        if ($request->image) {
            $upload = $request->image->store('images/jogador');
            $request->image->move(public_path('images/jogador'), $upload);
            //Mudando no banco de dados o caminho da imagem
            Jogador::where('user_id', Auth::id())->update([
                "caminho_imagem_perfil_jogador" => $upload,
                'updated_at' => Carbon::now()
            ]);
            $mensagem = "Imagem  editada com sucesso!";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        } else {
            $mensagem = "Nenhuma Imagem Selecionada";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        }
    }
    public function adicionandoImagem(Request $request)
    {
        if ($request->image) {
            $upload = $request->image->store('images/jogador');
            $request->image->move(public_path('images/jogador'), $upload);
            //Mudando no banco de dados o caminho da imagem
            Jogador::where('user_id', Auth::id())->update([
                "caminho_imagem_perfil_jogador" => $upload,
                'updated_at' => Carbon::now()
            ]);
            $mensagem = "Imagem  adicionada com sucesso!";
            return redirect('jogador/' . Auth::id() . '/edit')->with('mensagem', $mensagem);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ImagemTimeController extends Controller
{
    public function adicionarImagem($request)
    {
        //Salvando imagem no disco+
        $path = "images/times"; //Caminho onde ficará a imagem
        $upload = $request->imagem_time->store($path); //Salvando na pasta storage
        $request->imagem_time->move(public_path($path), $upload); //Movendo para pasta pública
        return $upload;
    }
    public function editarImagem(Request $request, $id_time)
    {
        if ($request->imagem_time) {

            $time = Time::where('id', $id_time)->first(); //Buscando time para buscar o caminho da imagem e editar
            if (file_exists($time->caminho_imagem_time)) {
                //Verificando se o arquivo existe, se existir, remover
                Storage::delete($time->caminho_imagem_time); //Removendo do HD
                unlink($time->caminho_imagem_time); //Removendo da pasta publcia
            }
            //Adicionando nova imagem
            $path = "images/times"; //Caminho onde ficará a imagem
            $upload = $request->imagem_time->store($path); //Salvando na pasta storage
            $request->imagem_time->move(public_path($path), $upload); //Movendo para pasta pública
            Time::where('id', $id_time)->update(['caminho_imagem_time' => $upload]);
            $mensagem = "Imagem editada com sucesso!";
            return redirect('time/' . $id_time . '/edit')->with('mensagem', $mensagem);             //Alterando o caminho da imagem no banco de dados
        } else {
            $mensagem = "Nenhuma imagem selecionada";
            return redirect('time/' . $id_time . '/edit')->with('mensagem', $mensagem);
        }
    }
    public function removerImagem($id_time)
    {
        $time = Time::where('id', $id_time)->first(); //Buscando time para buscar o caminho da imagem e editar
        if (file_exists($time->caminho_imagem_time)) {
            //Verificando se o arquivo existe, se existir, remover
            Storage::delete($time->caminho_imagem_time); //Removendo do HD
            unlink($time->caminho_imagem_time); //Removendo da pasta publcia
        }
        Time::where('id', $id_time)->update(['caminho_imagem_time' => null]);
        $mensagem = "Imagem removida com sucesso!";
        return redirect('time/' . $id_time . '/edit')->with('mensagem', $mensagem);
    }
    public function adicionaImagemonEdit(Request $request, $id_time)
    {
        if ($request->imagem_time) {
            $path = "images/times"; //Caminho onde ficará a imagem
            $upload = $request->imagem_time->store($path); //Salvando na pasta storage
            $request->imagem_time->move(public_path($path), $upload); //Movendo para pasta pública
            Time::where('id', $id_time)->update(['caminho_imagem_time' => $upload]);
            $mensagem = "Imagem Adicionada com sucesso!";
            return redirect('time/' . $id_time . '/edit')->with('mensagem', $mensagem);
        }
    }
}

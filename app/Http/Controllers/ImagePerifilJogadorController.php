<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagePerifilJogadorController extends Controller
{
    public function salvandoImagem($imagem){       
        $upload = $imagem->store('images/jogador');
        $imagem->move(public_path('images/jogador'), $upload);
        return $upload;
    }
}

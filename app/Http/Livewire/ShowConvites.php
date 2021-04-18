<?php

namespace App\Http\Livewire;

use App\Models\conviteJogadoresTime;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowConvites extends Component
{
    public function render()
    {
        return view('livewire.show-convites', ['convites'=>$this->showingConvites()]);
    }
    public function showingConvites()
    {
        //Preciso retornar o nome do time
        $convites = conviteJogadoresTime::where('id_jogador', Auth::id())->where('recusado', 0)->get();
        if (count($convites) > 0) {
            for ($i = 0; $i < count($convites); $i++) {
                $time = Time::where('id', $convites[$i]->id_time)->first();
                $convites[$i]['nome_time'] = $time->nome;
                $convites[$i]['imagem_time'] = $time->caminho_imagem_time;
                $convites[$i]['frase_time'] = $time->frase;
            }
        }
        return $convites;
    }
}

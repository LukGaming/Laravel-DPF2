<?php

namespace App\Http\Livewire;

use App\Models\conviteJogadoresTime;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ConvidandoJogadorInscritoNaVagaParaTime extends Component
{
    public $id_jogador;
    public function render()
    {
        return view('livewire.convidando-jogador-inscrito-na-vaga-para-time', ['convite_enviado'=>$this->conviteEnviado()]);
    }
    public function convidarJogador()
    {
        conviteJogadoresTime::create(['id_jogador' => $this->id_jogador, 'id_time' => $this->idDoMeuTime()]);
        session()->flash('convite_enviado', "Convite enviado com sucesso!");
    }
    public function idDoMeuTime()
    {
        return  $id_do_meu_time = Time::where('user_id', Auth::id())->first()->id;
    }
    public function conviteEnviado()
    {
        $convites = conviteJogadoresTime::where('id_jogador', $this->id_jogador)->where('id_time', $this->idDoMeuTime())->get();
        if (count($convites) > 0) {
            return 1;
        } else {
            return 0;
        }
    }
    public function removerConvite()
    {
        $remover_convite = conviteJogadoresTime::where('id_jogador', $this->id_jogador)->where('id_time', $this->idDoMeuTime())->delete();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\subscribeVagaTime;
use App\Models\vagasTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class InscrevendoVaga extends Component
{
    public $time;
    public function render()
    {   //dd($this->verificaSeJogadorJaEstaInscritoEmAlgumaVaga());
        return view('livewire.inscrevendo-vaga', ['vagas' => vagasTime::where('id_time', $this->time)->get(), "vagas_inscritas" => $this->verificaSeJogadorJaEstaInscritoEmAlgumaVaga()]);
    }
    public function subscribeInVaga($vaga, $jogador)
    {
        subscribeVagaTime::create(['id_time' => $this->time, 'id_vaga' => $vaga, 'user_id' => $jogador]);
        session()->flash('inscrito_na_vaga', 'Inscrição realizada com sucesso, Seu perfil será mostrado para o Administrador do Time entrar em contato!');
    }
    public function verificaSeJogadorJaEstaInscritoEmAlgumaVaga()
    {
        //Essa funcao vai procurar se o jogador já está inscrito em alguma vaga, 
        //e trazer qual vaga para deixar o campo nao clicável, e dar opção de desinscrever-se da vaga
        return subscribeVagaTime::where('user_id', Auth::id())->where('id_time', $this->time)->get();
    }
    public function unsubscribeVaga($id_vaga, $id_jogador)
    {
        subscribeVagaTime::where('id', $id_vaga)->delete();
        session()->flash('remover_inscricao_vaga', 'Inscrição removida com sucesso!');
    }
}

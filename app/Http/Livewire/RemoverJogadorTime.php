<?php

namespace App\Http\Livewire;

use App\Models\Jogador;
use App\Models\jogadoresParticipantesTime;
use Illuminate\Contracts\Session\Session;
use Livewire\Component;

class RemoverJogadorTime extends Component
{
    public $time;
    public function render()
    {
        
        return view('livewire.remover-jogador-time', ['jogadores'=> $this->mostrandoJogadoresTime()]);
    }
    public function mostrandoJogadoresTime(){
        $jogadores_deste_time = jogadoresParticipantesTime::where('id_time', $this->time)->get();
        $dados_jogadores = array();
        for($i=0; $i<count($jogadores_deste_time); $i++){
            $jogador = Jogador::where('user_id', $jogadores_deste_time[$i]->id_jogador)->first();
            $dados_jogadores[$i]['id'] =  $jogador->user_id;
            $dados_jogadores[$i]['nick_jogador'] =  $jogador->nick_jogador;
            $dados_jogadores[$i]['imagem'] = $jogador->caminho_imagem_perfil_jogador;
        }
        return $dados_jogadores;
    }
    public function removerJogador($id_jogador){
        jogadoresParticipantesTime::where('id_jogador', $id_jogador)->delete();
        session()->flash('jogador_removido', "Jogador Removido com Sucesso!");
    }
}

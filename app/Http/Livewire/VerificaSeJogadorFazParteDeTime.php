<?php

namespace App\Http\Livewire;

use App\Models\jogadoresParticipantesTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
class VerificaSeJogadorFazParteDeTime extends Component
{
    public function render()
    {
        return view('livewire.verifica-se-jogador-faz-parte-de-time', ['participa_de_time'=>$this->verificaSeJogadorParticipaDeTime()]);
    }
    public function verificaSeJogadorParticipaDeTime(){
        $verifica_jogador_e_time =jogadoresParticipantesTime::where('id_jogador', Auth::id())->first();
        if($verifica_jogador_e_time){
            return ['id_jogador'=>Auth::id(), 'id_time'=>$verifica_jogador_e_time->id_time];
        }
        return 0;
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\jogadoresParticipantesTime;
use Livewire\Component;

class SairDoTime extends Component
{
    public $id_jogador;
    public $id_time;
    public function render()
    {
        return view('livewire.sair-do-time');
    }
    public function sairDoTime(){
        jogadoresParticipantesTime::where('id_time', $this->id_time)->where('id_jogador', $this->id_jogador)->delete();
        session()->flash('saindo_time', 'Voce não faz mais parte deste Time!');
    }
}


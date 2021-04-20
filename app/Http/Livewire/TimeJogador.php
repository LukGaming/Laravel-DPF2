<?php

namespace App\Http\Livewire;

use App\Models\jogadoresParticipantesTime;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TimeJogador extends Component
{
    public $id_time;

    public function render()
    {
        
        return view('livewire.time-jogador', ['jogador_tem_time' => $this->jogador_tem_time(), 'id_link_time'=>$this->verificandoIdDoTime()]);
    }
    public function jogador_tem_time()
    {
        $jogador_time = jogadoresParticipantesTime::where('id_jogador', Auth::id())->first();
        $jogador_criador_time = Time::where('user_id', Auth::id())->first();
        if ($jogador_time || $jogador_criador_time) {
            return 1;
        } else {
            return 0;
        }
    }
    public function verificandoIdDoTime()
    {
        if ($this->jogador_tem_time()) {
            $time = jogadoresParticipantesTime::where('id_jogador', Auth::id())->first();
            if($time){
                $this->id_time = $time->id_time;
                return $this->id_time;
            }
            return null;
        }
        return null;
    }
}

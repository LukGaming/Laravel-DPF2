<?php

namespace App\Http\Livewire;

use App\Models\conviteJogadoresTime;
use App\Models\jogadoresParticipantesTime;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AceitaRecusaConvite extends Component
{
    public $id_time;
    public $nome_time;
    public $id_convite;
    public function render()
    {
        return view('livewire.aceita-recusa-convite');
    }
    public function aceitarConvite($id_time, $id_jogador)
    {
        jogadoresParticipantesTime::create(['id_time' => $id_time, 'id_jogador' => $id_jogador]);
        session()->flash('convite_aceito', 'Agora voce faz parte do Time: ' . $this->nome_time);
    }
    public function recusarConvite($id_time, $id_jogador)
    {
        $convite = conviteJogadoresTime::where('id_jogador',$id_jogador)->where('id_time',$id_time)->first();
        $convite->update(['recusado'=>1]);
        session()->flash('convite_recusado', 'Convite do time ' . $this->nome_time.' Recusado com sucesso!');
    }
}

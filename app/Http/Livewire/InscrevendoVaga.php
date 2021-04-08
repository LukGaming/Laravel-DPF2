<?php

namespace App\Http\Livewire;

use App\Models\subscribeVagaTime;
use App\Models\vagasTime;
use Livewire\Component;


class InscrevendoVaga extends Component
{
    public $time;
    public function render()
    {
        return view('livewire.inscrevendo-vaga', ['vagas' => vagasTime::where('id_time', $this->time)->get()]);
    }
    public function subscribeInVaga($vaga, $jogador)
    {
        subscribeVagaTime::create(['id_time'=>$this->time, 'id_vaga'=>$vaga, 'user_id'=>$jogador]); 
    }
}

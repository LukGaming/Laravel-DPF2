<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MensagensTimeJogador extends Component
{
    public $time;
    public $jogador;
    public function render()
    {
        return view('livewire.mensagens-time-jogador');
    }
}

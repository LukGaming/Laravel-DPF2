<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VagasTime extends Component
{
    public $time;
    public $funcao;
    public $descricao;
    public function render()
    {
        return view('livewire.vagas-time');
    }
    public function adicionarVaga(){
        
        if($this->funcao == null){
            $this->funcao = "Capitão/Igl";
        }
        if(strlen($this->descricao) <= 5){
            session()->flash('descricao', "Descreva um pouco melhor a vaga!");
        }
        else{
            
        }

    }
}

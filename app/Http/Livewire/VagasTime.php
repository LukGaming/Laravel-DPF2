<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Livewire\VagasTime;
use App\Models\vagasTime as ModelsVagasTime;

class VagasTime extends Component
{
    public $time;
    public $funcao;
    public $descricao;
    public $vagasEdit = [];
    public function render()
    {
        return view('livewire.vagas-time', ["vagas_iniciais" => $this->initialVagas()]);
    }
    public function adicionarVaga()
    {
        if ($this->funcao == null) {
            $this->funcao = "Capitão/Igl";
        }
        if (strlen($this->descricao) <= 5) {
            session()->flash('descricao', "Descreva um pouco melhor a vaga!");
        } else {
            ModelsVagasTime::create(["descricao" => $this->descricao, "funcao" => $this->funcao, "id_time" => $this->time]);
            session()->flash('vaga_adicionada', "Vaga Adicionada Com sucesso!");
            $this->descricao = "";
        }
    }
    public function initialVagas()
    {
        return ModelsVagasTime::where('id_time', $this->time)->get();
    }
    public function removerVaga($id_vaga)
    {
        ModelsVagasTime::where('id', $id_vaga)->delete();
        session()->flash('vaga_removida', "Vaga Removida Com sucesso!");
    }
}

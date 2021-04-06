<?php

namespace App\Http\Livewire;

use App\Models\HorarioTreinoTime;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;


class HorarioTreinosTime extends Component
{
    public $dia_semana;
    public $horario_inicio;
    public $horario_fim;
    public $time;
    public function render()
    {
        $horarios_anteriores = $this->horarios_iniciais();
        return view('livewire.horario-treinos-time', ['horarios_anteriores' => $horarios_anteriores]);
    }
    public function adicionarTreino()
    {
        if ($this->dia_semana == null) {
            $this->dia_semana = "Segunda-Feira";
        }
        if ($this->horario_inicio == null || $this->horario_fim == null) {
            session()->flash('erro_horarios', 'Os horários não podem ser vazios');
        } else {
            HorarioTreinoTime::create([
                "dia_da_semana" => $this->dia_semana,
                "horario_inicio" => $this->horario_inicio,
                "horario_fim" => $this->horario_fim,
                "id_time" => $this->time
            ]);
            $this->dia_semana = "segunda-feira";
            $this->horario_inicio = null;
            $this->horario_fim = null;
            $this->horarios_iniciais();
            session()->flash('treino_adicionado', 'Horario de Treino Adicionado com Sucesso!');
        }
    }
    public function horarios_iniciais()
    {
        return  HorarioTreinoTime::where('id_time', $this->time)->get();
    }
    public function removerHorario($id_treino)
    {
        HorarioTreinoTime::where('id', $id_treino)->delete();
        session()->flash('treino_adicionado', 'Horario Removido com sucesso!');
        $this->horarios_iniciais();
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\conviteJogadoresTime;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlertConvites extends Component
{
    public function render()
    {
        return view('livewire.alert-convites', ['convites' => $this->notificaConvites(), 'dono_de_time' => $this->verificaSeSouDonoDeTime()]);
    }
    public function notificaConvites()
    {
        $convites = conviteJogadoresTime::where('id_jogador', Auth::id())->get();
        if (count($convites) > 0) {
            return count($convites);
        } else {
            return 0;
        }
    }
    public function verificaSeSouDonoDeTime()
    {
        $time = Time::where('user_id', Auth::id())->first();
        if ($time) {
            return 1;
        } else {
            return 0;
        }
    }
}

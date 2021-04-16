<?php

namespace App\Http\Livewire;

use App\Models\mensagensTimeJogador;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AlertMensagens extends Component
{
    public $id_usuario;

    public function render()
    {
        return view('livewire.alert-mensagens', ['mensagens' => count($this->lastMessages())]);
    }
    public function lastMessages()
    {
        //Verificando se eu sou jogador ou time
       $dono_time = Time::where('user_id', $this->id_usuario)->first();
        if ($dono_time) {
            if ($dono_time->user_id == Auth::id()) {
                $ultimas_mensagens = mensagensTimeJogador::where('id_time', $dono_time->id)->where('visualizado_pelo_time',  0)->get();
                return $ultimas_mensagens;
                //dd($ultimas_mensagens);
            } else {
                $ultimas_mensagens = mensagensTimeJogador::where('user_id', Auth::id())->orWhere('id_jogador', Auth::id())->where('visualizado_pelo_jogador',0)->get();
                return $ultimas_mensagens;//dd($ultimas_mensagens);
            }
        } else {
            $ultimas_mensagens = mensagensTimeJogador::where('visualizado_pelo_jogador',0)->Where('id_jogador', Auth::id())->get();
            return  $ultimas_mensagens;//dd($ultimas_mensagens);
        }
    }
}

<?php

namespace App\Http\Livewire;

use App\Models\Jogador;
use Livewire\Component;
use App\Models\mensagensTimeJogador;
use App\Models\Time;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class Mensagens extends Component
{
    public $time;
    public $jogador;
    public $body;
    public function render()
    {
        return view('livewire.mensagens', ['old_messages' => $this->oldMessages(), 'dono_time' => $this->verificaSeSouJogadorOuTime(), 'imagem_time' => $this->imagemTime(), 'imagem_jogador' => $this->imagemJogador()]);
    }
    public function sendMessage()
    {
        $this->dispatchBrowserEvent('mensagem_enviada');
        if ($this->body) {
            mensagensTimeJogador::create(['body' => $this->body, 'id_time' => $this->time, 'id_jogador' => $this->jogador, 'user_id' => Auth::id()]);
            $this->body = "";
        }
    }
    public function oldMessages()

    {
        $this->dispatchBrowserEvent('mensagem_recebida');
        return  DB::table('mensagens_time_jogadors')->where('id_time', $this->time)->where('id_jogador', $this->jogador)->get();
    }
    public function verificaSeSouJogadorOuTime()
    {
        $jogador_dono_do_time = Time::where('id', $this->time)->first()->user_id; //Procurando o jogador
        if ($jogador_dono_do_time == Auth::id()) {
            return 1;
        } else {
            return 0;
        }
    }
    public function imagemTime()
    {
        return Time::where('id', $this->time)->first()->caminho_imagem_time;
    }
    public function imagemJogador()
    {
        return  Jogador::where('user_id', $this->jogador)->first()->caminho_imagem_perfil_jogador;
    }
    public function removerMensagem($id_mensagem){
        mensagensTimeJogador::where('id', $id_mensagem)->delete();
    }
}

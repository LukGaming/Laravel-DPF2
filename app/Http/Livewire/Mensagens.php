<?php

namespace App\Http\Livewire;

use App\Models\Jogador;
use App\Models\mensagensPermitidas;
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
    public $permissao_jogador;
    public $permissao_mensagem;
    public function render()
    {

        return view('livewire.mensagens', ['old_messages' => $this->oldMessages(), 'dono_time' => $this->verificaSeSouJogadorOuTime(), 'imagem_time' => $this->imagemTime(), 'imagem_jogador' => $this->imagemJogador(), 'permissao_mensagens' => $this->verificaPermissaoMensagem()]);
    }
    public function sendMessage()
    {
        if ($this->verificaSeSouJogadorOuTime()) { //Se for dono do time!
            if ($this->body) {
                mensagensTimeJogador::create(['body' => $this->body, 'id_time' => $this->time, 'id_jogador' => $this->jogador, 'user_id' => Auth::id(), 'visualizado_pelo_time' => 1, 'visualizado_pelo_jogador' => 0]);
                $this->body = "";
            }
        } else { //Se for jogador
            mensagensTimeJogador::create(['body' => $this->body, 'id_time' => $this->time, 'id_jogador' => $this->jogador, 'user_id' => Auth::id(), 'visualizado_pelo_time' => 0, 'visualizado_pelo_jogador' => 1]);
            $this->body = "";
        }
        $this->dispatchBrowserEvent('mensagem_enviada');
    }
    public function oldMessages()

    {
        $this->dispatchBrowserEvent('mensagem_recebida');
        if ($this->verificaSeSouJogadorOuTime()) {
            //Sou time
            //dd($this->time, $this->jogador);
            $todas_as_mensagens = mensagensTimeJogador::where('id_time', $this->time)->where('id_jogador', $this->jogador)->where('visualizado_pelo_time', 0)->get();
            for ($i = 0; $i < count($todas_as_mensagens); $i++) {
                $todas_as_mensagens[$i]->update(['visualizado_pelo_time' => 1]);
            }
        } else {
            //Sou jogador
            $todas_as_mensagens = mensagensTimeJogador::where('id_time', $this->time)->where('id_jogador', $this->jogador)->where('visualizado_pelo_jogador', 0)->get();
            for ($i = 0; $i < count($todas_as_mensagens); $i++) {
                $todas_as_mensagens[$i]->update(['visualizado_pelo_jogador' => 1]);
            }
        }
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
    public function removerMensagem($id_mensagem)
    {
        mensagensTimeJogador::where('id', $id_mensagem)->delete();
    }
    public function habilitarMensagens($id_time, $id_jogador)
    {
        $permissao_mensagens = mensagensPermitidas::where('id_time', $id_time)->where('id_jogador', $id_jogador)->first();
        $permissao_mensagens->update(['permissao' => 1]);
    }
    public function desabilitarMensagens($id_time, $id_jogador)
    {
        $permissao_mensagens = mensagensPermitidas::where('id_time', $id_time)->where('id_jogador', $id_jogador)->first();
        $permissao_mensagens->update(['permissao' => 0]);
    }
    public function verificaPermissaoMensagem()
    {
        $permissao_mensagens = mensagensPermitidas::where('id_time', $this->time)->where('id_jogador', $this->jogador)->first();
        return $permissao_mensagens->permissao;
    }
}

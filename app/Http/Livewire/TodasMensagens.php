<?php

namespace App\Http\Livewire;

use App\Models\mensagensTimeJogador;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Http\Livewire\Mensagens;
use App\Models\Jogador;
use App\Models\Time;
use App\Models\User;




class TodasMensagens extends Component
{
    public function render()
    {
        dd($this->mostraUltimasMensagens());
        return view('livewire.todas-mensagens');
    }
    public function ultimasMensagens()
    {
        if ($this->verificaSeSouJogadorOuTime()) {
            //Verificando qual é o ID do meu time
            $id_time =  Time::where('user_id', Auth::id())->first()->id;
            $mensagens_time = mensagensTimeJogador::where('id_time', $id_time)->get();
            $usuarios_com_qual_enviei_mensagens = array();
            for ($i = 0; $i < count($mensagens_time); $i++) {
                if (!in_array($mensagens_time[$i]->id_jogador, $usuarios_com_qual_enviei_mensagens)) {
                    array_push($usuarios_com_qual_enviei_mensagens, $mensagens_time[$i]->id_jogador);
                }
            }
            return $usuarios_com_qual_enviei_mensagens;
        } else {
            $mensagens_jogador =  mensagensTimeJogador::where('id_jogador', Auth::id())->get();
            $time_com_qual_enviei_mensagens = array();
            for ($i = 0; $i < count($mensagens_jogador); $i++) {
                if (!in_array($mensagens_jogador[$i]->id_time, $time_com_qual_enviei_mensagens)) {
                    array_push($time_com_qual_enviei_mensagens, $mensagens_jogador[$i]->id_time);
                }
            }
            return $time_com_qual_enviei_mensagens;
        }
    }
    public function verificaSeSouJogadorOuTime()
    {
        $jogador_dono_do_time = Time::where('user_id', Auth::id())->first(); //->user_id; 
        if ($jogador_dono_do_time) {
            if ($jogador_dono_do_time->user_id == Auth::id()) {

                return 1;
            } else {
                return 0;
            }
        } else {
            return 0;
        }
    }
    public function mostraUltimasMensagens()
    {
        if ($this->verificaSeSouJogadorOuTime()) {
            //Retornando os jogadores que enviaram mensagens
            $id_dos_jogadores = $this->ultimasMensagens();

            $dados_jogador = array();
            for ($f = 0; $f < count($id_dos_jogadores); $f++) {
                $jogador = Jogador::where('user_id', $id_dos_jogadores[$f])->first();
                $dados_jogador[$f]['nome'] = $jogador->nick_jogador;
                $dados_jogador[$f]['id'] = $jogador->user_id;
            }
            return $dados_jogador;
        } else {
            //Retornando os times que enviaram mensagens
            $id_dos_times = $this->ultimasMensagens();

            $dados_do_time = array();
            for ($f = 0; $f < count($id_dos_times); $f++) {
                $time = Time::where('id', $id_dos_times[$f])->first();
                $dados_do_time[$f]['nome'] = $time->nome;
                $dados_do_time[$f]['id'] = $time->id;
            }
            return $dados_do_time;
        }
    }
}

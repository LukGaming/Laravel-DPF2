<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigPcJogador extends Model
{

    protected $fillable = [
        "monitor",
        "teclado",
        "mouse",
        "mousepad",
        "processador",
        "placa_mae",
        "placa_de_video",
        "memoria_ram",
        "fonte",
        "gabinete",
        "caminho_imagem_pc_jogador",
        'id_jogador'
    ];
}

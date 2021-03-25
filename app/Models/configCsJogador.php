<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class configCsJogador extends Model
{
    use HasFactory;


    protected $fillable = [
        "id",
        "resolucao",
        "sensibilidade",
        "crosshair",
        "viewmodel",
        "caminho_cfg",
        "id_jogador"
    ];
}

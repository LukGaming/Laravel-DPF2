<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    use HasFactory;

    protected $fillable = [
        "id",
        "nome",
        "frase",
        "descricao",
        "ativo",
        "numero_membros",
        "facebook",
        "instagram",
        "gamersclub",
        "faceit",
        "steam",
        "twitter",
        "twitch",
        "email",
        "caminho_imagem_time",
        "user_id"
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jogador extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'nick_jogador',
        'frase_perfil',
        'descricao_perfil_jogador',
        'funcao_primaria',
        'funcao_secundaria',
        'funcao_adicional',
        'ativo',
        'facebook',
        'instagram',
        'gamersclub',
        'faceit',
        'twitter',
        'steam',
        'twitch',
        'email_contato',
        'user_id', 
    ];            
}

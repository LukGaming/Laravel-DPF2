<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mensagensTimeJogador extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "body",
        "id_time",
        "id_jogador",
        "user_id",
        'visualizado_pelo_time',
        'visualizado_pelo_jogador'
    ];
}

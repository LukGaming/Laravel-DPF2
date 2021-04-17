<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conviteJogadoresTime extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "id_time",
        "id_jogador"
    ];
}

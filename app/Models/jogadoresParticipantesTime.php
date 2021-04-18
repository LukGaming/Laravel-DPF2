<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jogadoresParticipantesTime extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'id_jogador',
        'id_time'
    ];
}

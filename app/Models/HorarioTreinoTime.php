<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorarioTreinoTime extends Model
{
    use HasFactory;
    protected $fillable = [
        "dia_da_semana",
        "horario_inicio",
        "horario_fim",
        "id_time"
    ];
}

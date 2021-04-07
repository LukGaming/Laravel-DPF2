<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vagasTime extends Model
{
    use HasFactory;
    protected $fillable = [
        "id",
        "descricao",
        "funcao",
        "id_time",
        "created_at"
    ];
}

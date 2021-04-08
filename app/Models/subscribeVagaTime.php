<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscribeVagaTime extends Model
{
    use HasFactory;
    protected $fillable = [
       "id",
       "user_id",
       "id_time",
       "id_vaga"
    ];
}

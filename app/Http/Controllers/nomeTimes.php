<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time;

class nomeTimes extends Controller
{
    public function retrieve_team_names(){
        $times = Time::all();
        $nomes_times = array();
        for($i=0; $i<count($times); $i++){
            array_push($nomes_times, $times[$i]->nome);
        }
        return ['nomes'=>$nomes_times];
    }
}

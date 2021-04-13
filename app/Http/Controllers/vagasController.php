<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class vagasController extends Controller
{
    public function searchVagas(){
        return view('vagas/search-vagas');
    }
}

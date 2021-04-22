<?php

namespace App\Http\Livewire;

use App\Models\Jogador;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class SearchJogadores extends Component
{
    public $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $jogadores = $this->searchJogador();
        return view('livewire.search-jogadores', ['jogadores' => $jogadores]);
    }
    public function searchJogador()
    {

        if ($this->search == "") {

            return Jogador::paginate(12);
        } else {

              $resultado = Jogador::where('nick_jogador', 'like', '%' . strval($this->search) . '%')
                ->paginate(12);
              return $resultado;
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}

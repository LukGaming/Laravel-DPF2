<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\vagasTime;

class SearchVagas extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.search-vagas', ['vagas' => $this->searchVagas()]);
    }
    public function searchVagas()
    {
        if (!$this->search) {
            return vagasTime::paginate(12);
        } else {
             return vagasTime::where('funcao', $this->search)->paginate(12);
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Time;

class SearchTimes extends Component
{
    public $search;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $times = $this->searchTime();
        return view('livewire.search-times', ['times' => $times]);
    }
    public function searchTime()
    {
        if ($this->search == "") {
            return Time::paginate(12);
        } else {
            return  Time::where('nome', 'like', '%' . $this->search . '%')
                ->paginate(12);
        }
    }
    public function updatingSearch()
    {
        $this->resetPage();
    }
}

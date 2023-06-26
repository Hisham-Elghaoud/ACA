<?php

namespace App\Http\Livewire;

use App\Models\Decision;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DesisionPageComponent extends Component
{
    public $search_filter;
    public $search_year_filter;

    public function render()
    { 
        $search = '%'.$this->search_filter.'%';
        $years = DB::table('decisions')
        ->distinct('year')
        ->pluck('year');
        $decisions = Decision::when($this->search_filter, function ($q) use ($search){
            return $q->where('name', 'LIKE', $search);
        })
        ->when($this->search_year_filter, function ($query) {
            return $query->where('year', $this->search_year_filter);
        })->paginate(4);
        return view('livewire.desision-page-component', ['decisions' => $decisions, 'years' => $years])->layout('layouts.livewireapp');
    }
}

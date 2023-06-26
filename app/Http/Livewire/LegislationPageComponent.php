<?php

namespace App\Http\Livewire;

use App\Models\Legislation;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class LegislationPageComponent extends Component
{
    public $search_filter;
    public $search_number_filter;
    public $search_year_filter;

    public function render()
    {
        $search = '%'.$this->search_filter.'%';
        $years = DB::table('legislations')
        ->distinct('year')
        ->pluck('year');
        $legislations = Legislation::when($this->search_filter, function ($q) use ($search){
            return $q->where('name', 'LIKE', $search);
        })
        ->when($this->search_number_filter, function ($query) {
            return $query->where('legislation_num', $this->search_number_filter);
        })
        ->when($this->search_year_filter, function ($query) {
            return $query->where('year', $this->search_year_filter);
        })->paginate(4);
        return view('livewire.legislation-page-component', ['legislations' => $legislations, 'years' => $years])->layout('layouts.livewireapp');
    }
}

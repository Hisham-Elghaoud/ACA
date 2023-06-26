<?php

namespace App\Http\Livewire;

use App\Models\Study;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class StudyPageComponent extends Component
{
    public $search_filter;
    public $search_year_filter;

    public function render()
    {
        $search = '%'.$this->search_filter.'%';
        $years = DB::table('studies')
        ->distinct('year')
        ->pluck('year');
        $studies = Study::when($this->search_filter, function ($q) use ($search){
            return $q->where('name', 'LIKE', $search);
        })
        ->when($this->search_year_filter, function ($query) {
            return $query->where('year', $this->search_year_filter);
        })->paginate(4);
        return view('livewire.study-page-component',['studies' => $studies, 
        'years' => $years])->layout('layouts.livewireapp');
    }
}

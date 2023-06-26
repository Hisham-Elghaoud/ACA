<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class NewsPageComponent extends Component
{
    public $search_filter;
    public $search_category_filter;
    public $search_year_filter;

    public function render()
    {
        $search = '%'.$this->search_filter.'%';
        $categories = Category::get();
        $years = DB::table('news')
                ->select(DB::raw('DISTINCT YEAR(created_at) as year'))
                ->get();
        $news = News::when($this->search_filter, function ($q) use ($search){
            return $q->where('title', 'LIKE', $search)
            ->orWhere('content', 'LIKE', $search);
        })
        ->when($this->search_category_filter, function ($q){
            if($this->search_category_filter[0] != 'الكل'){
                return $q->whereIn('category_id', $this->search_category_filter);
            }
        })->when($this->search_year_filter, function ($query) use ($years) {
            if($this->search_year_filter[0] != 'الكل'){
                return $query->whereIn(DB::raw('YEAR(created_at)'), $this->search_year_filter);
            }
        })->paginate(4);
        return view('livewire.news-page-component', ['news' => $news, 
        'categories' => $categories, 'years' => $years])->layout('layouts.livewireapp');
    }
}

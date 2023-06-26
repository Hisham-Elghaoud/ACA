<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\ExtraSites;
use App\Models\News;
use App\Models\Setting;
use App\Models\VedioNews;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $settings = Setting::first();
        $fav_news = News::where('fav', true)->orderBy('created_at', 'DESC')->get();
        $latest_news = News::orderBy('created_at', 'DESC')->get()->take(5);
        $right_news = [$latest_news[0], $latest_news[1]];
        $left_news = [$latest_news[2], $latest_news[3], $latest_news[4]];
        
        $latest_vedio_news = VedioNews::orderBy('created_at', 'DESC')->get()->take(4);
        $last_vedio_new = $latest_vedio_news[0];
        $other_vedio_news = [$latest_vedio_news[1], $latest_vedio_news[2], $latest_vedio_news[3]];
        
        $extra_sites = ExtraSites::orderBy('created_at', 'DESC')->get();
        
        return view('front.index', ['settings' => $settings, 
        'fav_news' => $fav_news, 'right_news' => $right_news, 'left_news' => $left_news, 
        'last_vedio_new' => $last_vedio_new, 'other_vedio_news' => $other_vedio_news, 
        'extra_sites' => $extra_sites]); 
    }

    public function about(){
        $settings = Setting::first();
        return view('front.about', ['settings' => $settings]); 
    }
    
    public function branches(){
        $settings = Setting::first();
        $branches = Branch::paginate(10);
        return view('front.branches', ['settings' => $settings, 'branches' => $branches]); 
    }
    
    public function complaint_report(){
        $settings = Setting::first();
        return view('front.complaint_report', ['settings' => $settings]); 
    }
    
    public function report_form(){
        $settings = Setting::first();
        return view('front.report_form', ['settings' => $settings]); 
    }
}

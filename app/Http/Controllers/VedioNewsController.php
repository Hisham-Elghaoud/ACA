<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\VedioNews;
use Illuminate\Http\Request;

class VedioNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = VedioNews::paginate(10);
        $news->map(function($item){
            $item['category_name'] = Category::where('id', $item->category_id)->first()->name;
            return $item;
        });
        return view('admin.vedionews.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.vedionews.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'category_id' => 'required',
        ],[
            'title.required' => 'الإسم مطلوب',
            'link.required' => 'الرابط مطلوب',
            'category_id.required' => 'التصنيف مطلوب',
        ]);

        VedioNews::create([
            'title' => $request->title,
            'link' => $request->link,
            'category_id' => $request->category_id,
            'state' => $request->state,
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.vedionews.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VedioNews  $vedioNews
     * @return \Illuminate\Http\Response
     */
    public function show(VedioNews $vedioNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VedioNews  $vedioNews
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = VedioNews::findOrFail($id);
        $categories = Category::get();
        return view('admin.vedionews.edit', ['new' => $new, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VedioNews  $vedioNews
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = VedioNews::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'link' => 'required',
            'category_id' => 'required',
        ],[
            'title.required' => 'الإسم مطلوب',
            'link.required' => 'الرابط مطلوب',
            'category_id.required' => 'التصنيف مطلوب',
        ]);

        $new->update([
            'title' => $request->title,
            'link' => $request->link,
            'category_id' => $request->category_id,
            'state' => $request->state,
        ]);
        
        notify()->success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.vedionews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VedioNews  $vedioNews
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = VedioNews::findOrFail($id);
        $newTitle = $new->title.'_'.date('Y-m-d').'_'.rand(0, 1000);
        $new->update([
            'title' => $newTitle
        ]);

        $new->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.news.index');
    }
}

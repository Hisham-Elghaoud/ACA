<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\NewsDoc;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::paginate(10);
        $news->map(function($item){
            $item['category_name'] = Category::where('id', $item->category_id)->first()->name;
            return $item;
        });
        return view('admin.news.index', ['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.news.add', ['categories' => $categories]);
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
            'content' => 'required',
            'category_id' => 'required',
            'path' => 'required',
        ],[
            'title.required' => 'الإسم مطلوب',
            'content.required' => 'المحتوى مطلوب',
            'category_id.required' => 'التصنيف مطلوب',
            'path.required' => 'الصورة مطلوبة',
        ]);

        if ($request->hasFile('path')) {
            $file = $this->store_file([
                'source'=>$request->path,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
        }
        
        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'path' => $file,
            'fav' => $request->fav,
            'state' => $request->state,
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $new = News::findOrFail($id);
        $new_docs = NewsDoc::where('news_id', $id)->get();
        $categories = Category::get();
        return view('admin.news.edit', ['new' => $new, 'categories' => $categories, 'new_docs' => $new_docs]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $new = News::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ],[
            'title.required' => 'الإسم مطلوب',
            'content.required' => 'المحتوى مطلوب',
            'category_id.required' => 'التصنيف مطلوب',
        ]);

        if ($request->hasFile('path')) {
            $file = $this->store_file([
                'source'=>$request->path,
                'validation'=>"image",
                'path_to_save'=>'/uploads/website/',
                'type'=>'IMAGE',
                'user_id'=>\Auth::user()->id,
                'resize'=>[500,1000],
                'small_path'=>'small/',
                'visibility'=>'PUBLIC',
                'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                'compress'=>'auto'
            ])['filename'];
        }else{
            $file = $new->path;
        }

        $new->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'path' => $file,
            'fav' => $request->fav,
            'state' => $request->state,
        ]);

        if ($request->file('paths')) {
            foreach($request->paths as $image){
                $subfile = $this->store_file([
                    'source'=>$image,
                    'validation'=>"image",
                    'path_to_save'=>'/uploads/website/',
                    'type'=>'IMAGE',
                    'user_id'=>\Auth::user()->id,
                    'resize'=>[500,1000],
                    'small_path'=>'small/',
                    'visibility'=>'PUBLIC',
                    'file_system_type'=>env('FILESYSTEM_DRIVER', 'local'),
                    'compress'=>'auto'
                ])['filename'];

                NewsDoc::create([
                    'path' => $subfile,
                    'news_id' => $new->id
                ]);
            }
        }

        notify()->success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $new = News::findOrFail($id);
        $newTitle = $new->title.'_'.date('Y-m-d').'_'.rand(0, 1000);
        $new->update([
            'title' => $newTitle
        ]);

        $new->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.news.index');
    }
    
    public function delete_doc($id)
    {
        $new = NewsDoc::findOrFail($id);

        $new->forceDelete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }
}

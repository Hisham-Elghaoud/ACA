<?php

namespace App\Http\Controllers;

use App\Models\ExtraSites;
use Illuminate\Http\Request;

class ExtraSitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sites = ExtraSites::paginate(10);
        return view('admin.extrasites.index', ['sites' => $sites]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.extrasites.add');
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
            'link' => 'required',
            'path' => 'required',
        ],[
            'link.required' => 'الرابط مطلوب',
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

        ExtraSites::create([
            'link' => $request->link,
            'path' => $file,
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.extrasites.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ExtraSites  $extraSites
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraSites $extraSites)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ExtraSites  $extraSites
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $site = ExtraSites::findOrFail($id);
        return view('admin.extrasites.edit', ['site' => $site]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ExtraSites  $extraSites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $site = ExtraSites::findOrFail($id);

        $request->validate([
            'link' => 'required',
        ],[
            'link.required' => 'الرابط مطلوب',
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
            $file = $site->path;
        }

        $site->update([
            'link' => $request->link,
            'path' => $file,
        ]);
        
        notify()->success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.extrasites.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ExtraSites  $extraSites
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $site = ExtraSites::findOrFail($id);
        $newLink = $site->title.'_'.date('Y-m-d').'_'.rand(0, 1000);
        $site->update([
            'link' => $newLink
        ]);

        $site->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.extrasites.index');
    }
}

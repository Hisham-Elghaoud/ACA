<?php

namespace App\Http\Controllers;

use App\Models\Inquirie;
use Illuminate\Http\Request;

class InquirieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inquiries = Inquirie::paginate(10);
        return view('admin.inquiries.index', ['inquiries' => $inquiries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'summary' => 'required',
        ],[
            'summary.required' => 'البلاغ مطلوب',
        ]);
        
        Inquirie::create([
            'summary' => $request->summary,
        ]);

        (new \App\Helpers\MainHelper)->notify_user([
            'user_id'=>1,
            'message'=>"Mail",
            'url'=>"/admin/inquiries",
                  'methods'=>['database']
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Inquirie  $inquirie
     * @return \Illuminate\Http\Response
     */
    public function show(Inquirie $inquirie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Inquirie  $inquirie
     * @return \Illuminate\Http\Response
     */
    public function edit(Inquirie $inquirie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inquirie  $inquirie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inquirie $inquirie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Inquirie  $inquirie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inquirie = Inquirie::findOrFail($id);
        $inquirie->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.inquiries.index');
    }
}

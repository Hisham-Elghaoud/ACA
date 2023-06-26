<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = Branch::paginate(10);
        return view('admin.branches.index', ['branches' => $branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.branches.add');
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
            'name' => 'required|unique:branches',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'name.unique' => 'الإسم موجود مسبقا',
            'address.required' => 'العنوان مطلوب',
            'phone.required' => 'الهاتف مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
        ]);

        Branch::create($request->all());
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.branches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        return view('admin.branches.edit', ['branch' => $branch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'address.required' => 'العنوان مطلوب',
            'phone.required' => 'الهاتف مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
        ]);

        $branch->update($request->all());
        
        notify()->success('تمت التعديل بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $newName = $branch->name.'_'.date('Y-m-d').'_'.rand(0, 1000);
        $branch->update([
            'name' => $newName
        ]);

        $branch->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.branches.index');
    }
}

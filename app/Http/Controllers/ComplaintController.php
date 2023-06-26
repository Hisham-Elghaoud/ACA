<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $complaints = Complaint::paginate(10);
        return view('admin.complaints.index', ['complaints' => $complaints]);
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
            'name' => 'required',
            'phone' => 'required',
            'personal_identification' => 'required',
            'national_number' => 'required',
            'complaint_against' => 'required',
            'summary' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'phone.required' => 'الهاتف مطلوب',
            'personal_identification.required' => 'الإثباث الشخصي مطلوب',
            'national_number.required' => 'الرقم الوطني مطلوب',
            'complaint_against.required' => 'المشكو ضده مطلوب',
            'summary.required' => 'البلاغ مطلوب',
        ]);
        
        
        if ($request->hasFile('path')) {
            $file = $request->path->store('/public/uploads/website');
        }else{
            $file = null;
        }

        Complaint::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'personal_identification' => $request->personal_identification,
            'national_number' => $request->national_number,
            'complaint_against' => $request->complaint_against,
            'summary' => $request->summary,
            'path' => $file,
        ]);

        (new \App\Helpers\MainHelper)->notify_user([
            'user_id'=>1,
            'message'=>"Mail",
            'url'=>"/admin/complaints",
                  'methods'=>['database']
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.complaints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function show(Complaint $complaint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function edit(Complaint $complaint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Complaint $complaint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Complaint  $complaint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.complaints.index');
    }
}

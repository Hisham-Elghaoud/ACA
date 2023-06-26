<?php

namespace App\Http\Controllers;

use App\Models\YearlyReport;
use Illuminate\Http\Request;

class YearlyReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = YearlyReport::paginate(10);
        return view('admin.yearlyreports.index', ['reports' => $reports]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.yearlyreports.add');
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
            'year' => 'required',
            'report_num' => 'required',
            'path' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'year.required' => 'السنة مطلوبة',
            'report_num.required' => 'رقم التقرير مطلوب',
            'path.required' => 'الملف مطلوب',
        ]);

        if ($request->hasFile('path')) {
            
            $file = $request->path->store('/public/uploads/website');
        }
        
        YearlyReport::create([
            'name' => $request->name,
            'year' => $request->year,
            'report_num' => $request->report_num,
            'date' => $request->date,
            'path' => $file,
            'state' => $request->state,
        ]);
        
        notify()->success('تمت الإضافة بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.yearlyreports.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\YearlyReport  $yearlyReport
     * @return \Illuminate\Http\Response
     */
    public function show(YearlyReport $yearlyReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\YearlyReport  $yearlyReport
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $report = YearlyReport::findOrFail($id);
        return view('admin.yearlyreports.edit', ['report' => $report]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\YearlyReport  $yearlyReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $report = YearlyReport::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'report_num' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'year.required' => 'السنة مطلوبة',
            'report_num.required' => 'رقم التقرير مطلوب',
        ]);
        
        if ($request->hasFile('path')) {
            $file = $request->path->store('/public/uploads/website');
        }else{
            $file = $report->path;
        }

        $report->update([
            'name' => $request->name,
            'year' => $request->year,
            'report_num' => $request->report_num,
            'date' => $request->date,
            'path' => $file,
            'state' => $request->state,
        ]);

        notify()->success('تم التعديل بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.yearlyreports.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\YearlyReport  $yearlyReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $report = YearlyReport::findOrFail($id);
        $newName = $report->name.'_'.date('Y-m-d').'_'.rand(0, 1000);
        $report->update([
            'name' => $newName
        ]);

        $report->delete();

        notify()->success('تم الحذف بنجاح', 'عملية ناجحة');
        return redirect()->route('admin.yearlyreports.index');
    }
}

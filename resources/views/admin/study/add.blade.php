@extends('layouts.admin')
@section('content')

<style type="text/css">
    .settings-tab-opener {
        box-shadow: 0px 6px 12px #ebebeb;
        border-radius: 11px;
        cursor: pointer;
        width: 80px;
        height: 45px;
    }

    .settings-tab-opener.active {
        box-shadow: 0px 6px 12px #c8e0ff !important;
        color: #fff;
        background: #2196f3;
    }

    .taber:not(.active) {
        display: none;
    }

</style>
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <form action="{{route('admin.study.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>رقم التقرير</label>
              <input type="text" required name="study_num" class="form-control">
            </div>
            <div class="form-group">
              <label>الإسم</label>
              <input type="text" required name="name" class="form-control">
            </div>
            <div class="form-group">
              <label>السنة</label>
              <input type="number" required name="year" class="form-control">
            </div>

            <div class="form-group">
              <label>التاريخ</label>
              <input type="date" name="date" class="form-control">
            </div>

            <div class="form-group">
                <label>المرفق</label>
                <input type="file" required name="path" class="form-control">
            </div>

            <div class="form-group">
              <label>الحالة</label>
              <select name="state" class="form-control">
                <option value="active">نشط</option>
                <option value="inactive">غير نشط</option>
              </select>
            </div> 
            <br>
            <button type="submit" class="btn btn-primary mx-1 font-1 save-image">{{trans('auth.add')}}</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>
@endsection
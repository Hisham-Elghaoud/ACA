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
        <form action="{{route('admin.branches.store')}}" method="post">
            @csrf
            <div class="form-group">
              <label>الإسم</label>
              <input type="text" required name="name" class="form-control">
            </div>
            <div class="form-group">
              <label>العنوان</label>
              <input type="text" required name="address" class="form-control">
            </div>
            <div class="form-group">
              <label>الهاتف</label>
              <input type="text" required name="phone" class="form-control">
            </div>
            <div class="form-group">
              <label>البريد الإلكتروني</label>
              <input type="email" required name="email" class="form-control">
            </div>
            <div class="form-group">
              <label>الفاكس</label>
              <input type="text" name="fax" class="form-control">
            </div>
            <div class="form-group">
              <label>الطول</label>
              <input type="text" name="longitude" class="form-control">
            </div>
            <div class="form-group">
              <label>العرض</label>
              <input type="text" name="Latitude" class="form-control">
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
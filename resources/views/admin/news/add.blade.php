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
        <form action="{{route('admin.news.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label>العنوان</label>
              <input type="text" required name="title" class="form-control">
            </div>
            <div class="form-group">
              <label>المحتوى</label>
              <textarea type="text" required name="content" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label>التصنيف</label>
              <select required name="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            </div> 

            <div class="form-group">
                <label>الصورة</label>
                <input type="file" required name="path" class="form-control">
            </div>

            <div class="form-group">
              <label>عرض بالصفحة الرئيسية</label>
              <select name="fav" class="form-control">
                <option value="1">نشط</option>
                <option value="0">غير نشط</option>
              </select>
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
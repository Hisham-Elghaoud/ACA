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
        <form action="{{route('admin.vedionews.update', [$new->id])}}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group">
              <label>العنوان</label>
              <input type="text" required name="title" class="form-control" value="{{$new->title}}">
            </div>
            <div class="form-group">
              <label>الرابط</label>
              <textarea type="text" required name="link" class="form-control">{{$new->link}}</textarea>
            </div>

            <div class="form-group">
              <label>التصنيف</label>
              <select required name="category_id" class="form-control">
                @foreach ($categories as $category)
                @if($category->id == $new->category_id)
                <option selected value="{{$category->id}}">{{$category->name}}</option>
                @else
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endif
                @endforeach
              </select>
            </div> 

            <div class="form-group">
              <label>الحالة</label>
              <select name="state" class="form-control">
                @if($new->state == 'active')
                <option selected value="active">نشط</option>
                <option value="inactive">غير نشط</option>
                @else
                <option value="active">نشط</option>
                <option selected value="inactive">غير نشط</option>
                @endif
              </select>
            </div> 
            <br>
            <button type="submit" class="btn btn-warning mx-1 font-1 save-image">تعديل</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>
@endsection
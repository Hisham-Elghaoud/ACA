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
        <form action="{{route('admin.extrasites.update', [$site->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
              <label>الرابط</label>
              <textarea type="text" required name="link" class="form-control">{{$site->link}}</textarea>
            </div>

            <div class="form-group">
                <label>الصورة</label>
                <input type="file" name="path" class="form-control">
                <div class="col-12 p-2">
                    <img src="{{asset('storage/public/uploads/website')}}/{{ $site->path }}" style="width:100px;max-height: 100px;">
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-warning mx-1 font-1 save-image">تعديل</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>
@endsection
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
        <form action="{{route('admin.news.update', [$new->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            <div class="form-group">
              <label>العنوان</label>
              <input type="text" required name="title" class="form-control" value="{{$new->title}}">
            </div>
            <div class="form-group">
              <label>المحتوى</label>
              <textarea type="text" required name="content" class="form-control">{{$new->content}}</textarea>
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
                <label>الصورة</label>
                <input type="file" name="path" class="form-control">
                <div class="col-12 p-2">
                    <img src="{{asset('storage/public/uploads/website')}}/{{ $new->path }}" style="width:100px;max-height: 100px;">
                </div>
            </div>
            
            <div class="form-group">
                <label>البوم الصور</label>
                <input type="file" name="paths[]" multiple class="form-control">
                @foreach ($new_docs as $new_doc)
                <div class="row">
                <div class="col-2 p-2">
                    <img src="{{asset('storage/public/uploads/website')}}/{{ $new_doc->path }}" style="width:64px;max-height: 64px;">
                </div>
                <div class="col-10 p-2">
                    <a data-bs-toggle="modal" data-bs-target="#newsDocModal{{$new_doc->id}}" title="حذف" style="cursor: pointer;"><i class="fa fa-times fa-2x text-danger"></i></a>
                </div>
                
					<div class="modal fade" id="newsDocModal{{$new_doc->id}}" tabindex="-1" aria-labelledby="newsDocModalLabel{{$new->id}}" aria-hidden="true">
						<div class="modal-dialog" style="width:394px;max-width: 100%">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">حذف صورة</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								هل انت متأكد من الحذف
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary mx-1 font-1" data-bs-dismiss="modal" aria-label="Close">{{trans('auth.close')}}</button>
								<a href="{{route('admin.news.delete_doc', $new_doc->id)}}" class="btn btn-danger mx-1 font-1 save-image">{{trans('auth.delete')}}</a>
							</div>
						</div>
						</div>
					</div>
                </div>
                @endforeach
            </div>

            <div class="form-group">
              <label>عرض بالصفحة الرئيسية</label>
              <select name="fav" class="form-control">
                @if($new->fav == true)
                <option selected value="1">نشط</option>
                <option value="0">غير نشط</option>
                @else
                <option value="1">نشط</option>
                <option selected value="0">غير نشط</option>
                @endif
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
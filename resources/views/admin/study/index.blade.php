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
<div class="col-12 px-0 py-2" style="background: #fff;">
	{{-- <div class="row">
		<div class="col-10"></div>
		<div class="col-2 col-lg-2 px-2">
			<a href="{{route('admin.templates.addtemplate')}}" class="btn btn-primary">{{trans('auth.add')}}</a>
		</div>
	</div> --}}
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<a href="{{route('admin.study.create')}}"  class="btn btn-primary">إضافة</a>
		</div>
		<div class="col-1"></div>
	</div>
	<div class="row">
		<div class="col-1"></div>
		<div class="col-10">
			<table id="branches" class="compact row-border cell-border" width="100%">
				<thead class="thead-dark">
				  <tr>
					<th scope="col">#</th>
					<th scope="col">رقم التقرير</th>
					<th scope="col">الإسم</th>
					<th scope="col">السنة</th>
					<th scope="col">{{trans('auth.action')}}</th>
				  </tr>
				</thead>
				<tbody>
					@foreach ($reports as $key => $report)
					<tr>
					  <th scope="row">{{$key + 1}}</th>
					  <td>{{$report->study_num}}</td>
					  <td>{{$report->name}}</td>
					  <td>{{$report->year}}</td>
					  <td>
                        <a href="{{route('admin.study.edit', [$report->id])}}" title="تعديل" style="margin-left: 15px;"><i class="fa fa-edit fa-2x"></i></a>
                        <a data-bs-toggle="modal" data-bs-target="#reportModal{{$report->id}}" title="حذف" style="cursor: pointer;"><i class="fa fa-times fa-2x text-danger"></i></a>
					</td>
					</tr>
					<div class="modal fade" id="reportModal{{$report->id}}" tabindex="-1" aria-labelledby="reportModalLabel{{$report->id}}" aria-hidden="true">
						<div class="modal-dialog" style="width:394px;max-width: 100%">
						<div class="modal-content">
							<div class="modal-header">
							<h5 class="modal-title">حذف تقرير</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								هل انت متأكد من الحذف
							</div>
							<div class="modal-footer">
								<button class="btn btn-secondary mx-1 font-1" data-bs-dismiss="modal" aria-label="Close">{{trans('auth.close')}}</button>
								<a href="{{route('admin.study.delete', $report->id)}}" class="btn btn-danger mx-1 font-1 save-image">{{trans('auth.delete')}}</a>
							</div>
						</div>
						</div>
					</div>
					@endforeach
				</tbody>
			</table>
			{{$reports->links()}}
		</div>
		<div class="col-1"></div>
	</div>
</div>
@endsection
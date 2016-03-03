@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin phóng viên' }}
@stop

@section('content')

@include('admin.news_report.scriptindex')

@include('admin.news_report.search')
<!-- inclue Search form 

-->

<div class="row">
	<div class="col-xs-12">
	  	<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách tin phóng viên</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			    <table class="table table-hover">
					<tr>
						
						<th>ID</th>
						<th>Tiêu đề</th>
						<th>Thể loại</th>
						<th>Số lượt view</th>
						<th>Ngày xuất bản</th>
						<th>Trạng thái</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($inputNew as $value)
					<tr>
						
						<td>{{ $value->id }}</td>
						<td>{{ $value->title }}</td>
						<td>{{ TypeNew::find($value->type_new_id)->name }}</td>
						<td>{{ $value->count_view }}</td>
						<td>{{ $value->start_date }}</td>
						<td>{{ NewsManager::getNameStatusIndex($value->status, $value->user_id) }}</td>
						<td>
						<!-- @if(!Admin::isSeo()) -->
							<!-- <a href="{{-- action('NewsReportController@history', $value->id) --}}" class="btn btn-success">Lịch sử</a> -->
						<!-- @endif -->
							<a href="{{  action('NewsReportController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
						@if(!Admin::isSeo())
						{{ Form::open(array('method'=>'DELETE', 'action' => array('NewsReportController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
							<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
						{{ Form::close() }}
						@endif
						</td>
					</tr>
					@endforeach
			    </table>
			</div>
			<!-- /.box-body -->
	  	</div>
	    <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $inputNew->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


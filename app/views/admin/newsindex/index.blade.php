@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin trang chủ' }}
@stop

@section('content')

@include('admin.newsindex.scriptindex')

@include('admin.newsindex.search')
<!-- inclue Search form 

-->
@if(!Admin::isSeo())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsController@create') }}" class="btn btn-primary">Thêm mới tin</a>
		@if(Admin::isAdmin() || Admin::isEditor())
			<a onclick="updateIndexData();" class="btn btn-success">Cập nhật</a>
			<a onclick="updateNewsIndexSelected();" class="btn btn-success">Loại bỏ</a>
		@endif
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
	  	<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách tin trang chủ</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive no-padding">
			    <table class="table table-hover">
					<tr>
						@if(Admin::isAdmin() || Admin::isEditor())
						<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
						@endif
						<th>ID</th>
						<th>Tiêu đề</th>
						<th>Mức ưu tiên</th>
						<th>Thể loại</th>
						<th>Số lượt view</th>
						<th>Ngày xuất bản</th>
						<th>Trạng thái</th>
						<th>Người đăng</th>
						<th style="width:200px;">Action</th>
					</tr>
					@foreach($inputNew as $value)
					<tr>
						@if(Admin::isAdmin() || Admin::isEditor())
						<td><input type="checkbox" class="news_id" name="news_id[]" value="{{ $value->id }}" /></td>
						@endif
						<td>{{ $value->id }}</td>
						<td>{{ $value->title }}</td>
						@if(Admin::isAdmin() || Admin::isEditor())
							<td><input type="text" name="weight_number[]" value="{{ getZero($value->weight_number) }}" class="only_number" style="width: 50px; text-align: center;" /></td>
						@else
							<td>{{ getZero($value->weight_number) }}</td>
						@endif
						<td>{{ TypeNew::find($value->type_new_id)->name }}</td>
						<td>{{ $value->count_view }}</td>
						<td>{{ $value->start_date }}</td>
						<td>{{ NewsManager::getNameStatusIndex($value->status, $value->user_id) }}</td>
						<td>{{ NewsManager::getUserName($value->user_id) }}</td>
						<td>
						@if(Admin::isAdmin() || Admin::isEditor())
							<a href="{{ action('NewsIndexController@remove', $value->id) }}" class="btn btn-danger">Loại bỏ</a>
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


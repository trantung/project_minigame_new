@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin thường' }}
@stop

@section('content')

@include('admin.news.scriptindex')

@include('admin.news.search')
<!-- inclue Search form 

-->
@if(!Admin::isSeo())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsController@create') }}" class="btn btn-primary">Thêm mới tin thường</a>
		@if(Admin::isAdmin() || Admin::isEditor())
			<a onclick="updateNewsIndexData();" class="btn btn-success">Đưa ra trang chủ</a>
			<!-- <a onclick="updateNewsHotSelected();" class="btn btn-success">Tin nổi bật</a> -->
		@endif
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
	  	<div class="box">
			<div class="box-header">
			  <h3 class="box-title">Danh sách tin</h3>
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
						<th>Thể loại</th>
						<th>Số lượt view</th>
						<th>Ngày xuất bản</th>
						<th>Trạng thái</th>
						<th>Người đăng</th>
						<th style="width:250px;">Action</th>
					</tr>
					@foreach($inputNew as $value)
					<tr>
						@if(Admin::isAdmin() || Admin::isEditor())
						<td><input type="checkbox" class="news_id" name="news_id[]" value="{{ $value->id }}" /></td>
						@endif
						<td>{{ $value->id }}</td>
						@if($value->highlight != ACTIVE)
							<td>{{ $value->title }}</td>
						@else
							<td style="color: blue; font-weight: bold;">{{ $value->title }}</td>
						@endif
						<td>{{ TypeNew::find($value->type_new_id)->name }}</td>
						<td>{{ $value->count_view }}</td>
						<td>{{ $value->start_date }}</td>
						<td>{{ NewsManager::getNameStatusIndex($value->status, $value->user_id) }}</td>
						<td>{{ NewsManager::getUserName($value->user_id) }}</td>
						<td>
						<!-- @if(!Admin::isSeo()) -->
							<!-- <a href="{{-- action('NewsController@history', $value->id) --}}" class="btn btn-success">Lịch sử</a> -->
						<!-- @endif -->
							<a href="{{  action('NewsController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
							@if(!Admin::isSeo())
							{{ Form::open(array('method'=>'DELETE', 'action' => array('NewsController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
							{{ Form::close() }}
							@endif
							@if($value->highlight != ACTIVE)
								{{ Form::open(array('method'=>'POST', 'action' => array('NewsController@highLight', $value->id), 'style' => 'display: inline-block;')) }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn?');">Nổi bật</button>
								{{ Form::close() }}
							@else 
								{{ Form::open(array('method'=>'POST', 'action' => array('NewsController@removeHighLight', $value->id), 'style' => 'display: inline-block;')) }}
								<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn?');">Bỏ nổi bật</button>
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


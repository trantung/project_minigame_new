@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin' }}
@stop

@section('content')
@include('admin.newsreporter.search')
<!-- inclue Search form 

-->
@if(!Admin::isSeo())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsReporterController@create') }}" class="btn btn-primary">Thêm mới tin thường</a>
		<a href="{{ action('NewsReporterController@create_news_slide') }}" class="btn btn-primary">Thêm mới tin ảnh</a>
	</div>
</div>
@endif
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách loại tin</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tiêu đề</th>
			  <th>Thể loại</th>
			  <th>Trạng thái</th>
			  <th>Loại tin</th>
			  <th style="width:200px;">Action</th>
			</tr>
			 @foreach($inputNew as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->title }}</td>
			  @if($typeNew = TypeNew::find($value->type_new_id))
			  		<td>{{ $typeNew->name }}</td>
			  @else
					<td></td>
			  @endif
			  <td>{{ NewsManager::getNameStatusIndex($value->status, $value->user_id) }}</td>
			  <td>{{ statusNewsReporter($value->type) }}</td>
			  <td>
			  	<a href="{{  action('NewsReporterController@sendNews', $value->id) }}" class="btn btn-primary">Gửi bài</a>
			  	@if($value->type == ACTIVE)
					<a href="{{  action('NewsReporterController@edit_news_slide', $value->id) }}" class="btn btn-primary">Sửa</a>
				@else
					<a href="{{  action('NewsReporterController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
				@endif
				@if(!Admin::isSeo())
				{{ Form::open(array('method'=>'DELETE', 'action' => array('NewsReporterController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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


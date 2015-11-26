@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý góp ý' }}
@stop

@section('content')
@include('admin.feedback.search')
<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Quản lý góp ý</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên</th>
			  <th>Email</th>
			  <th>Tiêu đề</th>
			  <th>Nội dung góp ý</th>
			  <th>Thời gian góp ý</th>
			  <th>Device</th>
			  <th>Ip</th>
			  <th style="width:200px;">Action</th>
			</tr>
			 @foreach($inputFeedback as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->name }}</td>
			  <td>{{ $value->email }}</td>
			  <td>{{ $value->title }}</td>
			  <td>{{ $value->description }}</td>
			  <td>{{ $value->created_at }}</td>
			  <td>{{ $value->device }}</td>
			  <td>{{ $value->ip }}</td>
			  <td>
			  	@if($value->status == ACTIVE )
				<a href="{{  action('FeedbackController@edit', $value->id) }}" class="btn btn-danger">Hủy kích hoạt</a>
				@else
				<a href="{{  action('FeedbackController@edit', $value->id) }}" class="btn btn-primary">Kích hoạt</a>
				@endif
				{{ Form::open(array('method'=>'DELETE', 'action' => array('FeedbackController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
				{{ Form::close() }}
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
		{{ $inputFeedback->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


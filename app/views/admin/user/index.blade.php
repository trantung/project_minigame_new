@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý User' }}
@stop

@section('content')
@include('admin.score.search')
<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách User</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>user name</th>
			  <th>email</th>
			  <th>Tên</th>
			  <th>Trạng thái</th>
			  <th>ip</th>
			  <th>Device</th>
			  <th>đăng nhập cuối</th>
			  <th>Action</th>
			</tr>
			@foreach($inputUser as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->user_name }}</td>
			  <td>{{ $value->email }}</td>
			  <td>{{ $value->fullname }}</td>
			  <td>{{ $value->status }}</td>
			  <td>{{ $value->ip }}</td>
			  <td>{{ $value->device }}</td>
			  <td>{{ $value->update_at }}</td>
			  <td>
			  	@if($value->status == ACTIVE )
				<a href="{{action('UserController@edit', $value->id) }}" class="btn btn-danger">DeActive</a>
				@else
				<a href="{{action('CommentController@edit', $value->id) }}" class="btn btn-primary">Active</a>
				@endif
				{{ Form::open(array('method'=>'DELETE', 'action' => array('UserController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
				{{ Form::close() }}
			  </td>
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
		{{ $inputUser->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


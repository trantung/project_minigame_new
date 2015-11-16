@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý thành viên quản trị' }}
@stop

@section('content')

<!-- inclue Search form -->
@include('admin.manager.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('ManagerController@create') }}" class="btn btn-primary">Thêm thành viên</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách thành viên</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Email</th>
			  <th>Username</th>
			  <th>Quyền hạn</th>
			  <th style="width:200px;">&nbsp;</th>
			</tr>
			@foreach($data as $key => $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->email }}</td>
			  <td>{{ $value->username }}</td>
			  <td>{{ genRole($value->role_id) }}</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="{{ action('ManagerController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
				<a href="{{ action('ManagerController@destroy', $value->id) }}" class="btn btn-danger">Xóa</a>
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
			<li class="previous disabled"><a href="#">Previous</a></li>
			<li class="paginate_button active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li class="next"><a href="#">Next</a></li>
		</ul>
	</div>
</div>

@stop

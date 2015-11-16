@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý thành viên quản trị' }}
@stop

@section('content')

<!-- inclue Search form -->
@include('admin.manager.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="/users/create" class="btn btn-primary">Thêm thành viên</a>
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
			  <th>Role_id</th>
			  <th>Email</th>
			  <th>Password</th>
			  <th>Username</th>
			  <th style="width:200px;">&nbsp;</th>
			</tr>
			<tr>
			  <td>183</td>
			  <td>John Doe</td>
			  <td>11-7-2014</td>
			  <td><span class="label label-success">Approved</span></td>
			  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="/users/edit" class="btn btn-primary">Sửa</a>
				<a href="#" class="btn btn-danger">Xóa</a>
			  </td>
			</tr>
			<tr>
			  <td>219</td>
			  <td>Alexander Pierce</td>
			  <td>11-7-2014</td>
			  <td><span class="label label-warning">Pending</span></td>
			  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="/users/edit" class="btn btn-primary">Sửa</a>
				<a href="#" class="btn btn-danger">Xóa</a>
			  </td>
			</tr>
			<tr>
			  <td>657</td>
			  <td>Bob Doe</td>
			  <td>11-7-2014</td>
			  <td><span class="label label-primary">Approved</span></td>
			  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="/users/edit" class="btn btn-primary">Sửa</a>
				<a href="#" class="btn btn-danger">Xóa</a>
			  </td>
			</tr>
			<tr>
			  <td>175</td>
			  <td>Mike Doe</td>
			  <td>11-7-2014</td>
			  <td><span class="label label-danger">Denied</span></td>
			  <td>Bacon ipsum dolor sit amet salami venison chicken flank fatback doner.</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="/users/edit" class="btn btn-primary">Sửa</a>
				<a href="#" class="btn btn-danger">Xóa</a>
			  </td>
			</tr>
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

@extends('admin.layout.default')

@section('title')
{{ $title='Sửa thành viên' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="/users" class="btn btn-success">Danh sách thành viên</a>
    <a href="/users/create" class="btn btn-primary">Thêm thành viên</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
            <!-- form start -->
            <form action="" role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="username">Tên đăng nhập</label>
                  <div class="row">
                  	<div class="col-sm-6">
	                  	<input type="text" class="form-control" id="username" placeholder="Username">
	                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="row">
                  	<div class="col-sm-6">
                  		<input type="password" class="form-control" id="password" placeholder="Password
                  ">
                  	</div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="fullname">Họ tên</label>
                  	<div class="row">
	                  	<div class="col-sm-6">
	                  		<input type="text" class="form-control" id="fullname" placeholder="Fullname">
	              		</div>
          			</div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  	<div class="row">
	                  	<div class="col-sm-6">
	                  		<input type="email" class="form-control" id="email" placeholder="Email">
	              		</div>
          			</div>
                </div>
                <div class="form-group">
                  	<label for="avatar">Ảnh đại diện</label>
                  	<input type="file" id="avatar">
                  	<p class="help-block">(định dạng jpg, png).</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Kích hoạt
                  </label>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <input type="submit" class="btn btn-primary" value="Lưu lại" />
                <input type="reset" class="btn btn-default" value="Nhập lại" />
              </div>
            </form>
          </div>
          <!-- /.box -->
	</div>
</div>

@stop

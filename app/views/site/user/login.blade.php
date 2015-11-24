@extends('site.layout.default')

@section('title')
{{ $title='Đăng nhập tài khoản' }}
@stop

@section('content')

<div class="main">
	<div class="ad">
		<img src="assets/images/ad1.jpg" alt="" height="139" width="865" />
	</div>

	<div class="box">
		<h3>Đăng nhập</h3>
		<div class=" ad">
			<h4>Đăng nhập tài khoản?</h4>
		</div>
		{{ Form::open(array('action' => 'SiteController@doLogin', 'class' => 'form-horizontal')) }}
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label label-text">Tên tài khoản:</label>
				<div class="col-sm-4">
					<input type="text" name="username" class="form-control" id="username" placeholder="Username" required >
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label label-text">Mật khẩu:</label>
				<div class="col-sm-4">
					<input type="password" name="password" class="form-control" id="password" placeholder="password" required >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<input type="submit" class="btn btn-primary" value="Đăng nhập" />
					<!-- <input type="reset" class="btn btn-primary" value="Nhập lại" /> -->
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-6">
				Đăng nhập bằng<br>
					<button type="submit" class="fa fa-facebook" id="register"></button>
					<button type="submit" class="fa fa-google" id="register"></button>
				</div>
			</div>
		{{ Form::close() }}
		<div class="clearfix"></div>
	</div>
</div>

@stop
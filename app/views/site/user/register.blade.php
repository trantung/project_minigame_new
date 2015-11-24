@extends('site.layout.default')

@section('title')
{{ $title='Đăng ký tài khoản' }}
@stop

@section('content')

<div class="box">
	<h3>Đăng ký tài khoản</h3>
	<div class=" ad">
		<h4>Đăng ký tài khoản</h4>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	{{ Form::open(array('action' => 'AccountController@store', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Tên tài khoản (*):</label>
			<div class="col-sm-4">
				<input type="text" name="user_name" class="form-control" id="username" placeholder="Username" required >
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-4 control-label label-text">Mật khẩu (*):</label>
			<div class="col-sm-4">
				<input type="password" name="password" class="form-control" id="password" placeholder="password" required >
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-4 control-label label-text">Số điện thoại (*):</label>
			<div class="col-sm-4">
				<input type="text" name="phone" class="form-control" id="phone" placeholder="phone" required >
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-4 control-label label-text">Email (*):</label>
			<div class="col-sm-4">
				<input type="email" name="email" class="form-control" id="email" placeholder="email" required >
			</div>
		</div>
		<div class="form-group">
			<label for="code" class="col-sm-4 control-label">Mã xác nhận (*):</label>
			<div class="col-sm-4">
				<input type="text" name="code" class="form-control" id="code" placeholder="Mã xác nhận" required >
				<br /><p class="form-control cachar" >choi nhanh</p>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-6">
				<input type="checkbox" name="vehicle" value="check" required checked> Tôi đồng ý với các quy đinh trên<br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary form-control" value="Đăng ký" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-6">
			Đăng ký bằng<br>
				<button type="submit" class="fa fa-facebook" id="register"></button>
				<button type="submit" class="fa fa-google" id="register"></button>
			</div>
		</div>
	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

@stop
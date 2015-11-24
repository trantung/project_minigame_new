@extends('site.layout.default')

@section('title')
{{ $title='Đăng ký tài khoản' }}
@stop

@section('content')

<div class="main">
	<div class="ad">
		<img src="images/ad1.jpg" alt="" height="139" width="865" />
	</div>
	<div class="box">
		<h3>Đăng ký</h3>
		<div class=" ad">
			<h4>Đăng ký tài khoản</h4>
		</div>
		<form class="form-horizontal" role="form" method="post" action="#">
			<div class="form-group">
				<label for="username" class="col-sm-4 control-label label-text">Tên tài khoản:</label>
				<div class="col-sm-4">
					<input type="text" name="username" class="form-control" id="username" placeholder="Username" >
				</div>
			</div>
			<div class="form-group">
				<label for="password" class="col-sm-4 control-label label-text">Mật khẩu:</label>
				<div class="col-sm-4">
					<input type="text" name="password" class="form-control" id="password" placeholder="password" >
				</div>
			</div>
			<div class="form-group">
				<label for="phone" class="col-sm-4 control-label label-text">Số điện thoại:</label>
				<div class="col-sm-4">
					<input type="text" name="phone" class="form-control" id="phone" placeholder="phone" >
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-4 control-label label-text">Email:</label>
				<div class="col-sm-4">
					<input type="text" name="email" class="form-control" id="email" placeholder="email" >
				</div>
			</div>
			<div class="form-group">
				<label for="code" class="col-sm-4 control-label">Mã xác nhận (*):</label>
				<div class="col-sm-4">
					<input type="text" name="code" class="form-control" id="code" placeholder="Mã xác nhận" >
					<br /><p class="form-control cachar" >choi nhanh</p>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-6">
					<input type="checkbox" name="vehicle" value="check" checked> Tôi đồng ý với các quy đinh trên<br>
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
		</form>
		<div class="clearfix"></div>
	</div>
</div>

@stop
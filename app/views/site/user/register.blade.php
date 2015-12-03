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
				<input type="text" name="user_name" class="form-control" id="username" placeholder="Username" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-4 control-label label-text">Mật khẩu (*):</label>
			<div class="col-sm-4">
				<input type="password" name="password" class="form-control" id="password" placeholder="password" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="phone" class="col-sm-4 control-label label-text">Số điện thoại (*):</label>
			<div class="col-sm-4">
				<input type="text" name="phone" class="form-control" id="phone" placeholder="phone" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="email" class="col-sm-4 control-label label-text">Email (*):</label>
			<div class="col-sm-4">
				<input type="email" name="email" class="form-control" id="email" placeholder="email" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="captcha" class="col-sm-4 control-label">Mã xác nhận (*):</label>
			<div class="col-sm-4">
				<input type="text" name="captcha" class="form-control" id="captcha" placeholder="Mã xác nhận" maxlength="255" >
				<br />
				{{ HTML::image(URL::to('simplecaptcha'),'Captcha') }}
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-6">
				<input type="checkbox" name="vehicle" id="vehicle" value="check" checked> Tôi đồng ý với các quy đinh trên<br>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary form-control" value="Đăng ký" onclick="checkAgree();" />
			</div>
		</div>
		<script>
		function checkAgree() {
			if (!$('#vehicle').is(':checked')) {
				alert('Bạn chưa đồng ý với các quy định trên.');
				return false;
			}
		}
		</script>

	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

@stop
@extends('site.layout.default')

@section('title')
{{ $title='Đăng nhập tài khoản' }}
@stop

@section('content')

<div class="box">
	<h3>Đăng nhập tài khoản</h3>
	<div class=" ad">
		<h4>Đăng nhập tài khoản</h4>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	{{ Form::open(array('action' => 'SiteController@doLogin', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Tên tài khoản:</label>
			<div class="col-sm-4">
				<input type="text" name="user_name" class="form-control" id="username" placeholder="Username" maxlength="255" required >
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-4 control-label label-text">Mật khẩu:</label>
			<div class="col-sm-4">
				<input type="password" name="password" class="form-control" id="password" placeholder="password" maxlength="255" required >
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
				<a type="submit" href="{{  action('LoginFacebookController@loginfb') }}" class="fa fa-facebook" id="register"></a>
				<a class="btn" href="{{ action('GoogleController@logingoogle') }}"><i class="fa fa-google"></i>Login Google</a>
			</div>
		</div>
	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

@stop
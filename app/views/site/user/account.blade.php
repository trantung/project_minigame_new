@extends('site.layout.default')

@section('title')
{{ $title='Thông tin tài khoản' }}
@stop

@section('content')

<div class="box">
	<h3>Thông tin tài khoản</h3>
	<div class=" ad">
		<h4>{{ Auth::user()->get()->user_name }}</h4>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	<script type="text/javascript">
		window.onload = function() {
			document.getElementById('account-email').disabled = true;
			document.getElementById('account-password').disabled = true;
			document.getElementById('group-password-new').style.display = 'none';
			document.getElementById('group-password-new2').style.display = 'none';
			document.getElementById('edit-account').disabled = true;
		};
		function editPsw()
		{
			document.getElementById('account-password').disabled = false;
			document.getElementById('group-password-new').style.display = 'block';
			document.getElementById('group-password-new2').style.display = 'block';
			document.getElementById('edit-account').disabled = false;
		}
		function editEmail()
		{
			document.getElementById('account-email').disabled = false;
			document.getElementById('edit-account').disabled = false;
		}
	</script>
	{{ Form::open(array('action' => 'AccountController@doAccount', 'method' => 'PUT', 'class' => 'form-horizontal')) }}
		<div class="form-group">
			<label for="account-email" class="col-sm-4 control-label">Email (*):</label>
			<div class="col-sm-4">
				<input type="email" name="email" class="form-control" id="account-email" placeholder="Email" value="{{ $data->email }}" required >
			</div>
			<div class="col-sm-1"><a class="edit-email" onclick="editEmail();" title="Sửa email"><i class="fa fa-pencil-square-o"></i></a></div>
		</div>
		<div class="form-group">
			<label for="account-password" class="col-sm-4 control-label">Mật khẩu (*):</label>
			<div class="col-sm-4">
				<input type="password" name="password" class="form-control" id="account-password" placeholder="Password" required >
			</div>
			<div class="col-sm-1"><a class="edit-password" onclick="editPsw();" title="Sửa mật khẩu"><i class="fa fa-pencil-square-o"></i></a></div>
		</div>
		<div class="form-group" id="group-password-new">
			<label for="password_new" class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-4">
				<input type="password" name="password_new" class="form-control" id="password_new" placeholder="Nhập mật khẩu mới" required >
			</div>
		</div>
		<div class="form-group" id="group-password-new2">
			<label for="password_new2" class="col-sm-4 control-label">&nbsp;</label>
			<div class="col-sm-4">
				<input type="password" name="password_new2" class="form-control" id="password_new2" placeholder="Xác nhận mật khẩu mới" required >
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary col-sm-12" value="Cập nhật" id="edit-account" />
			</div>
		</div>
	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

@stop
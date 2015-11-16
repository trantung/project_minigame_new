<h1>Login</h1>
{{ Form::open(array('route' => 'admin.login')) }}
<div>
{{ Form::label('username', 'Username') }}
{{ Form::text('username') }}
</div>
<div>
{{ Form::label('password', 'Password') }}
{{ Form::password('password') }}
</div>
<div>
	{{ Form::submit('login') }}
</div>
{{ Form::close() }}

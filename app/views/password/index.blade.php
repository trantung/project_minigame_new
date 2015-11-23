<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quên mật khẩu</title>
    {{ HTML::script('assets/js/jquery-2.1.4.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}
    {{ HTML::style('assets/css/bootstrap.min.css') }}
</head>
<body>
<div class="container">

    <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
        <div class="panel panel-info" >
            <div class="panel-heading">
                <div class="panel-title">Quên mật khẩu</div>
            </div>
            @include('password.message')
            <div style="padding-top:30px" class="panel-body" >
                <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                <form id="loginform" class="form-horizontal" role="form" method = "post" action="{{ action('PasswordController@store') }}">
                    <div style="margin-bottom: 25px" class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" type="email" class="form-control" name="email" value="{{ Input::old('email') }}" placeholder="email" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="new_password" type="password" class="form-control" name="new_password" placeholder="password" maxlength="20" minlength="6" required>
                    </div>
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="re_password" type="password" class="form-control" name="re_password" placeholder="repeat password" maxlength="20" minlength="6" required>
                    </div>
                    <div style="margin-top:10px" class="form-group">
                        <!-- Button -->
                        <div class="col-md-12 controls">
                            <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                            <input type="submit" value="Reset password " id="btn-login" class="btn btn-success" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
</body>
</html>
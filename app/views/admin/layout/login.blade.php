<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Đăng nhập tài khoản</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  {{HTML::style('admin/bootstrap/css/bootstrap.min.css') }}
  <!-- Font Awesome -->
  {{HTML::style('admin/dist/css/font-awesome.min.css') }}
  <!-- Ionicons -->
  {{HTML::style('admin/dist/css/ionicons.min.css') }}
  <!-- Theme style -->
  {{HTML::style('admin/dist/css/AdminLTE.min.css') }}
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  {{HTML::style('admin/dist/css/skins/_all-skins.min.css') }}

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Đăng nhập</b></a>
  </div>
  <!-- /.login-logo -->

  <!-- Notifications: message/alert/waring -->
  @include('admin.common.message')
  <!-- ./ notifications: message/alert/waring -->

  <div class="login-box-body">
    <p class="login-box-msg">Đăng nhập tài khoản quản trị</p>

    <form action="#" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Tên đăng nhập">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Mật khẩu">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng nhập</button>
      </div>
    </form>
    <br />
    <a href="#">Quên mật khẩu?</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
{{ HTML::script('admin/plugins/jQuery/jQuery-2.1.4.min.js') }}
<!-- Bootstrap 3.3.5 -->
{{ HTML::script('admin/bootstrap/js/bootstrap.min.js') }}

</body>
</html>
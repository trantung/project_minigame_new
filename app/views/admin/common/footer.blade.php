<!-- jQuery 2.1.4 -->
{{ HTML::script('adminlte/plugins/jQuery/jQuery-2.1.4.min.js') }}
<!-- jQuery UI 1.11.4 -->
{{ HTML::script('adminlte/plugins/jQueryUI/jquery-ui.min.js') }}
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
{{ HTML::script('adminlte/bootstrap/js/bootstrap.min.js') }}
<!-- daterangepicker -->
{{ HTML::script('adminlte/plugins/daterangepicker/moment.min.js') }}
{{ HTML::script('adminlte/plugins/daterangepicker/daterangepicker.js') }}
<!-- datepicker -->
{{ HTML::script('adminlte/plugins/datepicker/bootstrap-datepicker.js') }}
<!-- Bootstrap WYSIHTML5 -->
{{ HTML::script('adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
<!-- FastClick -->
{{ HTML::script('adminlte/plugins/fastclick/fastclick.js') }}
<!-- AdminLTE App -->
{{ HTML::script('adminlte/dist/js/app.min.js') }}
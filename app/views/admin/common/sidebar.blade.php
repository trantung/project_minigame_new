<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">Menu</li>
      <li class="active">
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>Quản lý chuyên mục</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý chuyên mục</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý category</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gamepad"></i> <span>Quản lý Game</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('AdminGameController@index') }}"><i class="fa fa-circle-o"></i> Quản lý thể loại game</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý game</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Quản lý tin tức</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý loại tin</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý tin</a></li>
        </ul>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-comments"></i> <span>Quản lý comment</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-comment"></i> <span>Quản lý góp ý báo lỗi</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-picture-o"></i> <span>Quản lý quảng cáo</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý users</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cogs"></i> <span>Cấu hình chung</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý cấu hình SEO</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý phân trang</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý thành viên</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="/users"><i class="fa fa-circle-o"></i> Quản lý thành viên</a></li>
          <li><a href="/users/create"><i class="fa fa-circle-o"></i> Thêm thành viên</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Quản lý phân quyền</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý tài khoản</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Sửa thông tin tài khoản</a></li>
          <li><a href="#"><i class="fa fa-circle-o"></i> Đổi mật khẩu</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
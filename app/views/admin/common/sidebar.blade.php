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
      @if(Admin::isAdmin())
      <li class="treeview">
        <a href="#">
          <i class="fa fa-list"></i> <span>Quản lý chuyên mục</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('CategoryParentController@index') }}"><i class="fa fa-circle-o"></i> Quản lý chuyên mục</a></li>
          <li><a href="{{ action('CategoryController@index') }}"><i class="fa fa-circle-o"></i> Quản lý category</a></li>
        </ul>
      </li>
      @endif
      @if(Admin::isAdmin())
      <li class="treeview">
        <a href="#">
          <i class="fa fa-gamepad"></i> <span>Quản lý Game</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('GameTypeController@index') }}"><i class="fa fa-circle-o"></i> Quản lý thể loại game</a></li>
          <li><a href="{{ action('AdminGameController@index') }}"><i class="fa fa-circle-o"></i> Quản lý game</a></li>
        </ul>
      </li>
      @endif
      <li class="treeview">
        <a href="#">
          <i class="fa fa-newspaper-o"></i> <span>Quản lý tin tức</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('NewsTypeController@index') }}"><i class="fa fa-circle-o"></i> Quản thể loại tin</a></li>
          <li><a href="{{ action('NewsController@index') }}"><i class="fa fa-circle-o"></i> Quản lý tin</a></li>
        </ul>
      </li>
      @if(Admin::isAdmin())
      <li>
        <a href="#">
          <i class="fa fa-comments"></i> <span>Quản lý comment</span>
        </a>
      </li>
      @endif
      @if(Admin::isAdmin())
      <li>
        <a href="#">
          <i class="fa fa-comment"></i> <span>Quản lý góp ý báo lỗi</span>
        </a>
      </li>
      @endif
      @if(Admin::isAdmin())
      <li>
        <a href="#">
          <i class="fa fa-picture-o"></i> <span>Quản lý quảng cáo</span>
        </a>
      </li>
      @endif
      @if(Admin::isAdmin())
      <li>
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý users</span>
        </a>
      </li>
      @endif
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
      @if(Admin::isAdmin())
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i> <span>Quản lý thành viên</span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ action('ManagerController@index') }}"><i class="fa fa-circle-o"></i> Quản lý thành viên hệ thống</a></li>
          <li><a href="{{ action('ManagerController@create') }}"><i class="fa fa-circle-o"></i> Thêm thành viên hệ thống</a></li>
        </ul>
      </li>
      @endif
      <li>
        <a href="{{ action('ManagerController@edit', Auth::admin()->get()->id) }}">
          <i class="fa fa-users"></i> <span>Sửa thông tin tài khoản</span>
        </a>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
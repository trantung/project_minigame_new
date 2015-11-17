<!-- menu -->
<div id='cssmenu'>
	<div class="menu-login">
		<a href="#" class="signin"><i class="fa fa-user"></i> Đăng nhập</a>
		<a href="#" class="signup"><i class="fa fa-user-plus"></i> Đăng ký</a>
	</div>
	<div class="search1">
			<form action="index.html" >
							<input type="text" name="search" value="" title="search" placeholder="Tìm kiếm game" />
							<input type="submit" value="search" title="submit" />
					</form>
	</div>
	<ul>
		 <li class='active'><a href='index.html' class="color1"><i class="fa fa-home"></i> <span>Trang chủ</span></a></li>
		 <li><a href='#' class="color2"><i class="fa fa-android"></i> <span>Game Android</span></a></li>
		 <li class='has-sub'><a href='#' class="color3"><i class="fa fa-html5"></i> <span>Game HTML5</span></a>
				<ul>
					 <li><a href='#'><span>Bé gái</span></a></li>
					 <li><a href='#'><span>Bé trai</span></a></li>
					 <li><a href='#'><span>Chiến thuật</span></a></li>
					 <li><a href='#'><span>Hành động</span></a></li>
					 <li><a href='#'><span>Nấu ăn</span></a></li>
					 <li><a href='#'><span>Thời trang</span></a></li>
				</ul>
		 </li>
	</ul>
	<div class="menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Đóng lại</a></div>
</div>

<div class="top">
		<div class="container">
			<div class="row">
				<div class="menu-show"><a onclick="menushow()"><i class="fa fa-navicon"></i></a></div>
				<div class="logo">
						<a href="index.html"><img src="assets/images/logo.jpg" alt="" /></a>
				</div>
				<div class="search">
					<a class="iconfacebook"><i class="fa fa-facebook"></i></a>
					<a class="icongoogleplus" ><i class="fa fa-google-plus"></i></a>
					<form action="index.html">
							<input type="text" name="search" value="" title="search" placeholder="Tìm kiếm game" />
							<input type="submit" value="search" title="submit" />
					</form>
					<a  id="iconseach" onclick="menushow()" class="menu_show_list"><i class="fa fa-search"></i></a>
					<a   onclick="menushow()" class="menu_show_list"><i class="fa fa-navicon"></i></a>

				</div>
		 </div>
		</div>
</div>
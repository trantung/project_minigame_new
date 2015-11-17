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
		@foreach($data as $key => $value)
			@if(count($value->types) == 0)
			<li><a href='#' class="color2"><span>{{ $value->name }}</span></a></li>
			@else
			<li class='has-sub'><a href='#' class="color2"><span>{{ $value->name }}</span></a>
				<ul>
				@foreach($value->types as $k => $v)
					<li><a href='#'><span>{{ $v->name }}</span></a></li>
				@endforeach
				</ul>
			</li>
			@endif
		@endforeach
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
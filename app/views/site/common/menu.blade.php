<!-- menu -->
<div id='cssmenu'>
	@if(CommonSite::isLogin())
	<div class="menu-account">
          <a href="{{ action('AccountController@account') }}" class="account-name"><img src="assets/images/avatar.jpg" height="32" width="31" /> {{ Auth::user()->get()->user_name }}</a>
          {{-- <a href="#" class="game-favorite"><i class="fa fa-thumbs-o-up"></i> Game bạn yêu thích</a> --}}
          <a href="#" class="game-played"><i class="fa fa-gamepad"></i> Game bạn đã chơi</a>
          <a href="{{ action('SiteController@logout') }}" class="signout"><i class="fa fa-power-off"></i> Đăng xuất</a>
    </div>
    @else
	<div class="menu-login">
		<a href="{{ action('SiteController@login') }}" class="signin"><i class="fa fa-user"></i> Đăng nhập</a>
		<a href="{{ action('AccountController@create') }}" class="signup"><i class="fa fa-user-plus"></i> Đăng ký</a>
	</div>
	@endif

	<div class="search1">
		<form action="#" >
			<input type="text" name="search" value="" title="search" placeholder="Tìm kiếm game" />
			<input type="submit" value="search" title="submit" />
		</form>
	</div>
	<ul>
		<li class='active'><a href='/' class="color1"><i class="fa fa-home"></i> <span>Trang chủ</span></a></li>
		@foreach($menu as $key => $value)
			@if(count($value->parenttypes) == 0)
				@if($value->id == 1)
					<li><a href="{{ action('GameController@getListGameAndroid') }}" class="color2"><span>{{ $value->name }}</span></a></li>
				@else
					<li><a href="{{ '/' . $value->slug }}" class="color2"><span>{{ $value->name }}</span></a></li>
				@endif
			@else
			<li class='has-sub'><a href='#' class="color2"><span>{{ $value->name }}</span></a>
				<ul>
				@foreach(SiteIndex::getTypeOfParent($value->id) as $k => $v)
					<li><a href="{{ '/' . Type::find($v)->slug }}"><span>{{ Type::find($v)->name }}</span></a></li>
				@endforeach
				</ul>
			</li>
			@endif
		@endforeach
	</ul>
	<div class="menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Đóng lại</a></div>
</div>
<!-- menu -->
<div id='cssmenu'>

	@if(CommonSite::isLogin() )

	<?php
		if($image_url = Auth::user()->get()->image_url) {
			$avatar = url(UPLOADIMG . UPLOAD_USER_AVATAR . '/' . $image_url);
		} else {
			$avatar = url('/assets/images/avatar.jpg');
		}
	?>

	<div class="mobile-menu-account">
          <a href="{{ action('AccountController@account') }}" class="mobile-account-name"><img src="{{ $avatar }}" height="32" width="31" /> {{ Auth::user()->get()->user_name.Auth::user()->get()->uname.Auth::user()->get()->google_name }}</a>
          <a href="{{ action('SiteController@logout') }}" class="mobile-signout"><i class="fa fa-power-off"></i> Đăng xuất</a>
    </div>
    @else
	<div class="mobile-menu-login">
		<a href="{{ action('SiteController@login') }}" class="mobile-signin"><i class="fa fa-user"></i> Đăng nhập</a>
		<a href="{{ action('AccountController@create') }}" class="mobile-signup"><i class="fa fa-user-plus"></i> Đăng ký</a>
	</div>
	@endif

	<div class="mobile-search1">
		<form action="{{ action('SearchGameController@index') }}" >
			<input type="text" name="search" value="" title="search" id="searchmenu" placeholder="Tìm kiếm game" />
			<input type="submit" value="search" title="submit" />
		</form>
	</div>

	<ul>
		<li>
			<a href="{{ url('/') }}" {{ checkActive() }}>Trang chủ</a>
		</li>
		@foreach($menu_top as $v)
			<li>
				<a href="{{ action('SlugController@listData', $v->slug) }}">{{ $v->name }}</a>
			</li>
		@endforeach
		<li>
			<a href="{{ action('GameController@getListGameNew') }}" {{ checkActive('game-moi-nhat') }}>Game mới nhất</a>
		</li>
		<li>
			<a href="{{ action('GameController@getListGamehot') }}" {{ checkActive('game-hay-nhat') }}>Game hay nhất</a>
		</li>
		<li class="has-sub"><a href=""><span>Mini Game</span></a>
			<ul>
				@foreach(Type::all() as $value)
					<li><a href="{{ url('/' . $value->slug) }}"><span>{{ $value->name }}</span></a></li>
				@endforeach
			</ul>
		</li>
	</ul>
	<!-- <div class="mobile-menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Đóng lại</a></div> -->
</div>
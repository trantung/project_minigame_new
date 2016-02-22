<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		@if(getDevice() == COMPUTER)
		<div class="logo">
			<a href="{{ url('/') }}"><img src="{{ url('/assets/images/logo.png') }}" alt="" /></a>
			<p>{{ show_date_vn() }}</p>
		</div>
		@endif
	</div>
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		<span class="sr-only">Menu</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<div id="navbar" class="navbar-collapse collapse">
		@if(CommonSite::isLogin() )
		<?php
			if($image_url = Auth::user()->get()->image_url) {
				$avatar = url(UPLOADIMG . UPLOAD_USER_AVATAR . '/' . $image_url);
			} else {
				$avatar = url('/assets/images/avatar.jpg');
			}
		?>
		<div class="menu-account">
			  <a href="{{ action('AccountController@account') }}" class="account-name"><img src="{{ $avatar }}" height="32" width="31" /> {{ Auth::user()->get()->user_name.Auth::user()->get()->uname.Auth::user()->get()->google_name }}</a><span>|</span>
			  <a href="{{ action('SiteController@logout') }}" class="signout">Đăng xuất</a>
		</div>
		@else
		<div class="menu-login">
			<a href="{{ action('SiteController@login') }}" class="signin">Đăng nhập</a><span>|</span>
			<a href="{{ action('AccountController@create') }}" class="signup">Đăng ký</a>
		</div>
		@endif
		<ul class="nav navbar-nav navbar-right">
			<li>
				<a href="{{ action('GameController@index') }}" {{ checkActive('mini-game') }}>Mini Game</a>
			</li>
			@foreach($menu_top as $value)
				<li>
					<a href="{{ action('SiteNewsController@listNews', $value->slug) }}" {{ checkActive($value->slug, 2) }}>{{ $value->name }}</a>
				</li>
			@endforeach
		</ul>
		@include('site.common.type')
	</div>
</nav>

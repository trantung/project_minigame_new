<nav class="navbar navbar-default navbar-static-top">
	<div class="navbar-header">
		@if(getDevice() == COMPUTER)
		<div class="logo">
			<a href="{{ url('/') }}"><img src="{{ url('/assets/images/logo.png') }}" alt="" /></a>
			<p>Thứ 2, 1/2/2016 GMT+7</p>
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
			<li class="active">
				<a href="#">Mini Game</a>
			</li>
			@foreach($menu_top as $value)
				<li>
					<a href="{{ action('SiteNewsController@listNews', $value->slug) }}" {{ checkActive($value->slug) }}>{{ $value->name }}</a>
				</li>
			@endforeach
		</ul>
	</div>
</nav>
<div class="top-bar">
	<div class="row">
		<div class="col-sm-8">
			
		</div>
		<div class="col-sm-4">
			<div class="search">
				<form action="{{ action('SearchGameController@index') }}">
					<input type="text" name="search" value="" title="search" placeholder="Tìm kiếm game" />
					<input type="submit" value="search" title="submit" />
				</form>
			</div>
		</div>
	</div>
</div>
@if(getDevice() == COMPUTER)

<nav class="navbar navbar-default navbar-static-top">
	<div class="row">
		<div class="col-sm-3">
			<div class="navbar-header">
				<div class="logo">
					<a href="{{ url('/') }}"><img src="{{ url('/assets/images/logo.png') }}" alt="" title="" /></a>
					<h1>{{ $logo->text_link }}</h1>
				</div>
			</div>
		</div>
		<div class="col-sm-9">
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
					  <a href="{{ action('AccountController@account') }}" class="account-name" rel="noindex, nofollow"><img src="{{ $avatar }}" height="32" width="31" /> {{ Auth::user()->get()->user_name.Auth::user()->get()->uname.Auth::user()->get()->google_name }}</a><span>|</span>
					  <a href="{{ action('SiteController@logout') }}" class="signout" rel="noindex, nofollow">Đăng xuất</a>
				</div>
				@else
				<div class="menu-login">
					<a href="{{ action('SiteController@login') }}" class="signin" rel="noindex, nofollow">Đăng nhập</a><span>|</span>
					<a href="{{ action('AccountController@create') }}" class="signup" rel="noindex, nofollow">Đăng ký</a>
				</div>
				@endif
				<ul class="nav navbar-nav navbar-left">
					<li>
						<a href="{{ url('/') }}" {{ checkActive() }}>Trang chủ</a>
					</li>
					@foreach($menu_top as $value)
						<li>
							<a href="{{ action('SiteNewsController@listNews', $value->slug) }}" {{ checkActive($value->slug, 2) }}>{{ $value->name }}</a>
						</li>
					@endforeach
					<li>
						<a href="{{ action('GameController@getListGameNew') }}" {{ checkActive('game-moi-nhat') }}>Game mới nhất</a>
					</li>
					<li>
						<a href="{{ action('GameController@getListGamehot') }}" {{ checkActive('game-hay-nhat') }}>Game hay nhất</a>
					</li>
					<li>
						<a href="{{ action('GameController@index') }}" {{ checkActive('mini-game') }}>{{ MINI_GAME_TITLE }}</a>
					</li>
				</ul>
				<div class="divider"></div>
				@include('site.common.type')
			</div>
		</div>
	</div>
</nav>

@else

<div class="mobile-top">
	<div class="container">
		<div class="row">
			<div class="col-xs-5">
				<div class="mobile-top-left">
					<a href="{{ url('/') }}"><img src="{{ url('/assets/images/logo_mobile.png') }}" alt="" /></a>
				</div>
			</div>
			<div class="col-xs-7">
				<div class="mobile-top-right">
					<a id="iconseach" onclick="menushow()" class="mobile-menu_show_list"><i class="fa fa-search"></i></a>
					<a onclick="menushow()" class="mobile-menu_show_list"><i class="fa fa-navicon"></i></a>
				</div>
			</div>
		</div>
	</div>
</div>

@include('site.common.menu')

@endif
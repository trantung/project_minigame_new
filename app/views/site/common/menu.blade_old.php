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
		<li class='active'><a href='{{ url('/') }}'><i class="fa fa-home"></i> <span>Trang chủ</span></a></li>
		@foreach($menuHeader as $key => $value)
			@if($value->position == MENU)
				@if(count($value->parenttypes) == 0)
					@if($value->id == 1)
						<li><a href="{{ action('GameController@getListGameAndroid') }}"><span>{{ $value->name }}</span></a></li>
					@else
						<li><a href="{{ url('/' . $value->slug) }}"><span>{{ $value->name }}</span></a></li>
					@endif
				@else
				<li class="has-sub"><a href=""><span>{{ $value->name }}</span></a>
					<ul>
					@foreach(SiteIndex::getTypeOfParent($value->id) as $k => $v)
						<li><a href="{{ url('/' . SiteIndex::getFieldByType($v, 'slug')) }}"><span>{{ SiteIndex::getFieldByType($v, 'name') }}</span></a></li>
					@endforeach
					</ul>
				</li>
				@endif
			@endif
		@endforeach
	</ul>
	<div class="mobile-menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Đóng lại</a></div>
</div>
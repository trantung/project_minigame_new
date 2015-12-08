{{HTML::style('assets/css/font-awesome.min.css') }}
{{-- {{HTML::style('assets/css/bootstrap.min.css') }} --}}
{{HTML::style('assets/css/style-import.css') }}
{{ HTML::script('assets/js/jquery-2.1.4.min.js') }}
{{-- {{ HTML::script('assets/js/bootstrap.min.js') }} --}}
{{ HTML::script('assets/js/script.js') }}

<div class="menu-import">
	<div class="menu-button">
		<a onclick="menushow()" class="menu_show_list"><i class="fa fa-navicon"></i></a>
	</div>
	<!-- menu -->
	<div id='cssmenu'>

		@if(CommonSite::isLogin() )
		<div class="menu-account">
	          <a href="{{ action('AccountController@account') }}" class="account-name"><img src="{{ url('/assets/images/avatar.jpg') }}" height="32" width="31" /> {{ Auth::user()->get()->user_name.Auth::user()->get()->uname.Auth::user()->get()->google_name }}</a>
	          {{-- <a href="#" class="game-favorite"><i class="fa fa-thumbs-o-up"></i> Game bạn yêu thích</a> --}}
	          {{-- <a href="#" class="game-played"><i class="fa fa-gamepad"></i> Game bạn đã chơi</a> --}}
	          <a href="{{ action('SiteController@logout') }}" class="signout"><i class="fa fa-power-off"></i> Đăng xuất</a>
	    </div>
	    @else
		<div class="menu-login">
			<a href="{{ action('SiteController@login') }}" class="signin"><i class="fa fa-user"></i> Đăng nhập</a>
			<a href="{{ action('AccountController@create') }}" class="signup"><i class="fa fa-user-plus"></i> Đăng ký</a>
		</div>
		@endif

		<div class="search1">
			<form action="{{ action('SearchGameController@index') }}" >
				<input type="text" name="search" value="" title="search" placeholder="Tìm kiếm game" />
				<input type="submit" value="search" title="submit" />
			</form>
		</div>
		<ul>
			<li class='active'><a href='{{ url('/') }}' class="color1"><i class="fa fa-home"></i> <span>Trang chủ</span></a></li>
			@foreach($menu as $key => $value)
				@if(count($value->parenttypes) == 0)
					@if($value->id == 1)
						<li><a href="{{ action('GameController@getListGameAndroid') }}" class="color2"><span>{{ $value->name }}</span></a></li>
					@else
						<li><a href="{{ url('/' . $value->slug) }}" class="color2"><span>{{ $value->name }}</span></a></li>
					@endif
				@else
				<li class='has-sub'><a href= '#' class="color2"><span>{{ $value->name }}</span></a>
					<ul>
					@foreach(SiteIndex::getTypeOfParent($value->id) as $k => $v)
						<li><a href="{{ url('/' . Type::find($v)->slug) }}"><span>{{ Type::find($v)->name }}</span></a></li>
					@endforeach
					</ul>
				</li>
				@endif
			@endforeach
		</ul>
		<div class="menu-hide"><a onclick="menuhide()"><i class="fa fa-times-circle-o"></i> Đóng lại</a></div>
	</div>
</div>

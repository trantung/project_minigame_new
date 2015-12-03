<div class="menu-top">
	<div class="menu-static">
	  <ul>
		<li><a href="{{ url('/') }}" {{ checkActive() }}><i class="fa fa-home"></i><span>Home</span></a></li>

		<li><a href="{{ url('/game-binh-chon-nhieu') }}" {{ checkActive('game-binh-chon-nhieu') }}><i class="fa fa-star"></i><span>Bình chọn nhiều</br></span></a></li>
		<li><a href="{{ url('/game-hay-nhat') }}" {{ checkActive('game-hay-nhat') }}><i class="fa fa-gamepad"></i><span>Hay nhất</span></a></li>
		<li><a href="{{ action('SiteNewsController@index') }}" {{ checkActive('tin-tuc') }}><i class="fa fa-newspaper-o"></i><span>Tin tức</span></a></li>
		<li><a href="{{ action('GameController@getListGameAndroid') }}" {{ checkActive('game-android') }}><i class="fa fa-android"></i><span>Game android</span></a></li>
	  </ul>
	</div>
</div>
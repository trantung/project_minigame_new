<div class="menu-top">
	<div class="menu-static">
	  <ul>
		<li><a href="{{ url('/') }}" class="active"><i class="fa fa-home"></i><span>Home</span></a></li>
		<li><a href="{{ action('GameController@getListGameVote') }}"><i class="fa fa-star"></i><span>Vote nhiều</br></span></a></li>
		<li><a href="{{ action('GameController@getListGameplay') }}"><i class="fa fa-gamepad"></i><span>Hay nhất</span></a></li>
		<li><a href="{{ action('SiteNewsController@index') }}"><i class="fa fa-newspaper-o"></i><span>Tin tức</span></a></li>
		<li><a href="{{ action('GameController@getListGameAndroid') }}"><i class="fa fa-android"></i><span>Android</span></a></li>

	  </ul>
	</div>
</div>
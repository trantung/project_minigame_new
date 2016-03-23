@extends('site.layout.default')

@section('title')
		{{ $title= 'test ad' }}
@stop

@section('content')

<div class="box">

	<div class="playgame">
		<div class="playbox">
			<script type="text/javascript">
				function removeAdSwf() {
					document.getElementById("preloader").style.visibility = "hidden";
				}
				function noAdsReturned() {
					document.getElementById("preloader").style.visibility = "hidden";
				}
			</script>
			<object
				classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
				codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" 
				width="670" height="430" 
				id="preloader" 
				align="middle">
				<param name="allowScriptAccess" value="always" />
				<param name="allowFullScreen" value="false" />
			    <param name="movie" value="'.$link.'" type="application/x-shockwave-flash"></param>
			    <param name="quality" value="high" />
			    <param name="bgcolor" value="#ffffff" />
			    <param name="wmode" value="transparent"></param>
			    <param name="flashvars" value="adTagUrl=http://googleads.g.doubleclick.net/pagead/ads?ad_type=video_text_image_flash&client=ca-games-pub-1198251289541286&description_url=http%3A%2F%2Fgame.kienthuc.net.vn&videoad_start_delay=0&hl=en">
			    <embed src="{{ url('games-flash/datbomtocdo.swf') }}" 
		          	type="application/x-shockwave-flash" 
					quality="high" bgcolor="#000000" 
					width="670" height="430" 
					name="preloader" 
		          	align="middle" allowScriptAccess="always" 
		          	allowFullScreen="false" 
		          	flashVars="adTagUrl=http://googleads.g.doubleclick.net/pagead/ads?ad_type=video_text_image_flash&client=ca-games-pub-1198251289541286&description_url=http%3A%2F%2Fgame.kienthuc.net.vn&videoad_start_delay=0&hl=en" 
		          	pluginspage="http://www.adobe.com/go/getflashplayer" 
		          	wmode="direct">
			    </embed>
			</object> 
		</div>
	</div>

</div>

@stop
@extends('site.layout.default')

@section('title')
	{{ $title = 'test ad' }}
@stop

@section('content')

<div class="box">

	<div class="playgame">
		<div class="playbox">

			<script type='text/javascript'>
				var googletag = googletag || {};
				googletag.cmd = googletag.cmd || [];
				(function() {
					var gads = document.createElement('script');
					gads.async = true;
					gads.type = 'text/javascript';
					var useSSL = 'https:' == document.location.protocol;
					gads.src = (useSSL ? 'https:' : 'http:') + 
					'//www.googletagservices.com/tag/js/gpt.js';
					var node = document.getElementsByTagName('script')[0];
					node.parentNode.insertBefore(gads, node);
				})();
			</script>

			<script type="text/javascript">
				function removeAdSwf() {
					console.log(1);
					document.getElementById("game-ad").innerHTML = "";
					// document.getElementById("preloader").style.visibility = "hidden";
					document.getElementById('game-container').style.display='block';
				}
				function noAdsReturned() {
					console.log(2);
					document.getElementById("game-ad").innerHTML = "";
					// document.getElementById("preloader").style.visibility = "hidden";
					document.getElementById('game-container').style.display='block';
				}
			</script>

			<div id="game-ad">
				<object
					classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
					codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" 
					width="670" height="430" 
					id="preloader" 
					align="middle">
					<param name="allowScriptAccess" value="always" />
					<param name="allowFullScreen" value="false" />
				    <param name="movie" value="{{ url('games-flash/ima3_preloader_1.5.swf') }}" type="application/x-shockwave-flash"></param>
				    <param name="quality" value="high" />
				    <param name="bgcolor" value="#ffffff" />
				    <param name="wmode" value="transparent"></param>
				    <param name="flashvars" value="adTagUrl=http%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fad_type%3Dvideo_text_image_flash%26client%3Dca-games-pub-1198251289541286%26description_url%3Dhttp%253A%252F%252Fgame.kienthuc.net.vn%26videoad_start_delay%3D0%26hl%3Den" />
				    <embed src="{{ url('games-flash/ima3_preloader_1.5.swf') }}" 
			          	type="application/x-shockwave-flash" 
						quality="high" bgcolor="#000000" 
						width="670" height="430" 
						name="preloader" 
			          	align="middle" allowScriptAccess="always" 
			          	allowFullScreen="false" 
			          	flashVars="adTagUrl=http%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fad_type%3Dvideo_text_image_flash%26client%3Dca-games-pub-1198251289541286%26description_url%3Dhttp%253A%252F%252Fgame.kienthuc.net.vn%26videoad_start_delay%3D0%26hl%3Den" 
			          	pluginspage="http://www.adobe.com/go/getflashplayer" 
			          	wmode="direct">
				    </embed>
				</object>
			</div>

			<div id="game-container" style="display:none;">
				<object
					classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" 
					codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" 
					width="670" height="430" 
					id="preloader" 
					align="middle">
					<param name="allowScriptAccess" value="always" />
					<param name="allowFullScreen" value="false" />
				    <param name="movie" value="{{ url('games-flash/datbomtocdo.swf') }}" type="application/x-shockwave-flash"></param>
				    <param name="quality" value="high" />
				    <param name="bgcolor" value="#ffffff" />
				    <param name="wmode" value="transparent"></param>
				    <param name="flashvars" value="adTagUrl=http%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fad_type%3Dvideo_text_image_flash%26client%3Dca-games-pub-1198251289541286%26description_url%3Dhttp%253A%252F%252Fgame.kienthuc.net.vn%26videoad_start_delay%3D0%26hl%3Den" />
				    <embed src="{{ url('games-flash/datbomtocdo.swf') }}" 
			          	type="application/x-shockwave-flash" 
						quality="high" bgcolor="#000000" 
						width="670" height="430" 
						name="preloader" 
			          	align="middle" allowScriptAccess="always" 
			          	allowFullScreen="false" 
			          	flashVars="adTagUrl=http%3A%2F%2Fgoogleads.g.doubleclick.net%2Fpagead%2Fads%3Fad_type%3Dvideo_text_image_flash%26client%3Dca-games-pub-1198251289541286%26description_url%3Dhttp%253A%252F%252Fgame.kienthuc.net.vn%26videoad_start_delay%3D0%26hl%3Den" 
			          	pluginspage="http://www.adobe.com/go/getflashplayer" 
			          	wmode="direct">
				    </embed>
				</object>
			</div>

		</div>
	</div>

</div>

@stop
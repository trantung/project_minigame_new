<!DOCTYPE html>
<html>
	@include('site.common.header')
	<body>

		@include('site.common.menu')
		@include('site.common.topbar')
		@include('site.common.navbar')

		<div class="container">
			<div class="row">

			<div class="main">

				@include('site.common.ad', array('adPosition' => HEADER))

				@yield('content')

				@include('site.common.ad', array('adPosition' => Footer))

			</div>

			@include('site.common.footer')

			</div>
	  	</div>

	  	<div class="glass"></div>

		@if($script)
			{{ $script->footer_script }}
		@endif

		<div id="fb-root"></div>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : 421890461341536,
		      xfbml      : true,
		      version    : 'v2.5'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

	</body>
</html>
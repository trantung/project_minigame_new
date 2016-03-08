<!DOCTYPE html>
<html>
	@include('site.common.header')
	<body>

		<div class="container">
			<div class="row">

				<div class="main">

					@include('site.common.top')

					@yield('content')

				</div>

			</div>
	  	</div>

	  	<div class="container">
			<div class="row">

				@if(isset($model_name))
					@if(getDevice() == MOBILE)
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_FOOTER, 'model_name' => $model_name, 'model_id' => $model_id))
					@endif
				@endif

  				@include('site.common.footer')
	  		</div>
	  	</div>
		
		@if(isset($model_name))
			@if(getDevice() == COMPUTER)
				<div class="sticky_left">
					@include('site.common.ads', array('adPosition' => POSITION_STICKY_LEFT, 'model_name' => $model_name, 'model_id' => $model_id))
				</div>
				<div class="sticky_right">
					@include('site.common.ads', array('adPosition' => POSITION_STICKY_RIGHT, 'model_name' => $model_name, 'model_id' => $model_id))
				</div>
			@endif
		@endif

	  	<div class="glass"></div>

		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5&appId={{ APP_ID }}";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>

	</body>
</html>
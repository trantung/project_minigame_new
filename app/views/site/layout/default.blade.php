<!DOCTYPE html>
<html>
	@include('site.common.header')
	<body>

		@include('site.common.menu')
		@include('site.common.topbar')

		<div class="container">
			<div class="row">

		  	@include('site.common.navbar')

			<div class="clearfix"></div>

			<div class="main">

				@include('site.common.ad')

				@yield('content')

				@include('site.common.ad')

			</div>

			@include('site.common.footer')

			</div>
	  	</div>

	</body>
</html>
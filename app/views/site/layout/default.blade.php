<!DOCTYPE html>
<html>
	@include('site.common.header')
	<body>

		@include('site.common.topbar')

		<div class="container">
			<div class="row">

		  	@include('site.common.navbar')

			<div class="clearfix"></div>

			@yield('content')

			@include('site.common.footer')

			</div>
	  	</div>

	</body>
</html>
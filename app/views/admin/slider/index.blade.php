@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý slider' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminSlideController@create') }}" class="btn btn-primary">Thêm mới slide</a>
	</div>
</div> 

<div id="demo">
	<div id="owl-demo" class="owl-carousel">
		<div class="item"><img src="{{ url('demo_slider/fullimage1.jpg') }}" alt="The Last of us"></div>
		<div class="item"><img src="{{ url('demo_slider/fullimage2.jpg') }}" alt="The Last of us"></div>
		<div class="item"><img src="{{ url('demo_slider/fullimage3.jpg') }}" alt="The Last of us"></div>
	</div>
</div>
  {{ HTML::script('assets/js/owl.carousel.js') }}
  {{ HTML::style('assets/css/owl.carousel.css') }}
  {{ HTML::style('assets/css/owl.theme.css') }}
	<!-- Demo -->
	<style>
	#owl-demo .item img{
		display: block;
		width: 100%;
		height: auto;
	}
	</style>
	<script>
	$(document).ready(function() {
	  $("#owl-demo").owlCarousel({
	  navigation : true,
	  slideSpeed : 100,
	  autoPlay: true,
	  paginationSpeed : 100,
	  pagination: true,
	  singleItem : true,

	  // "singleItem:true" is a shortcut for:
	  // items : 1, 
	  // itemsDesktop : false,
	  // itemsDesktopSmall : false,
	  // itemsTablet: false,
	  // itemsMobile : false

	  });
	});
	</script>
  @stop

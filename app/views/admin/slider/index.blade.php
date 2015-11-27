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
<div class="box-body table-responsive no-padding">
  	<table class="table table-hover">
	<tr>
	  	<th>ID</th>
	  	<th>Tên slide</th>
	  	<th>Link</th>
	  	<th>Image</th>
	  	<th>Status</th>
	  	<th style="width:200px;">Action</th>
	</tr>
		@foreach($advertise as $value)
			<tr>
			  	<td>{{ $value->id }}</td>
				<td>{{ getPositionAdvertise($value->position) }}</td>
				<td>{{ $value->image_link }}</td>
				<td>
					<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer' .'/' .$value->id . '/' . $value->image_url) }}" ,width="100px", height="100px"  />
				</td>
				<td>{{ getStatusAdvertise($value->status) }} </td>
				<td>
				<a href="{{  action('AdvertiseController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
					{{ Form::open(array('method'=>'DELETE', 'action' => array('AdvertiseController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
						<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
					{{ Form::close() }}
			  	</td>
			</tr>
		@endforeach
  	</table>
</div>
@include('admin.common.paginate',['input' => $slides])
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

@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Type', $type->id), 'seoImage' => FOLDER_SEO_GAMETYPE . '/' . $type->id))

@section('title')
{{ $title=$type->name }}
@stop

@section('content')
<h1>Game {{ $type->name }} hay nhất</h1>

<div id="demo">
	<div id="owl-demo" class="owl-carousel">
		@for($i =0; $i < $count ; $i ++)
			<div class="box">
				<div class="row">
				<?php 
					$listGame = $games->orderBy('count_play', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
				?>
					@foreach($listGame as $game)
						<div class="col-xs-6 col-sm-3 col-md-2">
							<div class="item">
								<div class="item-image">
									<a href="{{ CommonGame::getUrlGame($game->slug) }}">
										<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
										<strong>{{ limit_text($game->name, TEXTLENGH) }}</strong>
									</a>
								</div>
								<div class="item-play">
									<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ getZero($game->count_play) }} lượt chơi</span><i class="play"><img src="{{ url('/assets/images/play.png') }}"></i></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
				{{ $i+1 }}/{{ $count }}
			</div>
		@endfor
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
	  autoPlay: false,
	  paginationSpeed : 100,
	  pagination: false,
	  singleItem : true,
	  paginationNumbers:true

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
@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('CategoryParent', 9), 'model_name' => 1, 'model_id' => 1))

@section('title')
	@if($title = CommonSite::getMetaSeo('CategoryParent', 9)->title_site)
		{{ $title = $title }}
	@else
		{{ $title = 'Game hay nhất' }}
	@endif
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => 'Game hay nhất', 'link' => action('GameController@getListGamehot')]
	);
?>
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'isH1' => 1, 'model_name' => 1, 'model_id' => 1])

<div class="box">
	<h3>Game hay nhất</h3>
	<?php
		$games = CommonGame::getListGame('play');
		$count = ceil(count($games->get())/PAGINATE_BOXGAME);
	?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			@for($i = 0; $i < $count ; $i ++)
				<div class="swiper-slide boxgame">
					<div class="row">
					<?php
						$listGame = $games->orderBy('count_play', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
					?>
						@foreach($listGame as $game)
							@include('site.game.gameitem', array('game' => $game))
						@endforeach
					</div>
				</div>
			@endfor
		</div>
		<div class="swiper-pagination"></div>
		<div class="boxgame-pagination">
			<a class="prev"><i class="fa fa-caret-left"></i> Trang trước</a>
			<div class="boxgame-pagenumber"><span class="numberPage">1</span>/{{ $count }}</div>
			<a class="next">Trang sau <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
</div>

{{-- quang cao --}}
@if(getDevice() == COMPUTER)
	@include('site.common.ads', array('adPosition' => POSITION_GAMES_GAMES, 'model_name' => 'Game_Most', 'model_id' => null))
@else
	@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAMES_GAMES, 'model_name' => 'Game_Most', 'model_id' => null))
@endif

<div class="box">
	<h3>Game mới nhất</h3>
	<?php
		$games = CommonGame::getListGame('play');
		$count = ceil(count($games->get())/PAGINATE_BOXGAME);
	?>
	<div class="swiper-container">
		<div class="swiper-wrapper">
			@for($i = 0; $i < $count ; $i ++)
				<div class="swiper-slide boxgame">
					<div class="row">
					<?php
						$listGame = $games->orderBy('start_date', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
					?>
						@foreach($listGame as $game)
							@include('site.game.gameitem', array('game' => $game))
						@endforeach
					</div>
				</div>
			@endfor
		</div>
		<div class="swiper-pagination"></div>
		<div class="boxgame-pagination">
			<a class="prev"><i class="fa fa-caret-left"></i> Trang trước</a>
			<div class="boxgame-pagenumber"><span class="numberPage">1</span>/{{ $count }}</div>
			<a class="next">Trang sau <i class="fa fa-caret-right"></i></a>
		</div>
	</div>
</div>

@include('site.game.scriptbox')

@stop

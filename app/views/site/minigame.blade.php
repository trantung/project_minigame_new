@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo(SEO_META), 'model_name' => 1, 'model_id' => 1))

@section('title')
	@if($title = CommonSite::getMetaSeo(SEO_META)->title_site)
		{{ $title= $title }}
	@else
		{{ $title= MINI_GAME_TITLE }}
	@endif
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => MINI_GAME_TITLE, 'link' => action('GameController@index')]
	);
?>
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'isH1' => 1, 'model_name' => 1, 'model_id' => 1])

<div class="minigame">
	@foreach($menu as $key => $value)
		<div class="box">
			@if($value->position == CONTENT)

				<h3>{{ $value->name }}</h3>

				@if($games = CommonGame::boxGameByCategoryParentIndex($value))
					<?php $count = ceil(count($games)/PAGINATE_BOXGAME);
						$count = getCount($count);
					 ?>
					<div class="swiper-container">
						<div class="swiper-wrapper">
							@for($i = 0; $i < $count; $i ++)
								<div class="swiper-slide boxgame">
									<div class="row">
									<?php
										//$listGame = $games->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
										$listGame = array_slice($games, $i * PAGINATE_BOXGAME, PAGINATE_BOXGAME);
									?>
										@foreach($listGame as $game)
											@include('site.game.gameitemindex', array('game' => $game))
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
				@endif

				@if(getDevice() == COMPUTER)
					@include('site.common.ads', array('adPosition' => POSITION_GAME_MINI, 'model_name' => 'CategoryParent', 'model_id' => $value->id))
				@else
					@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAME_MINI, 'model_name' => 'CategoryParent', 'model_id' => $value->id))
				@endif

			@endif
		</div>
	@endforeach
</div>

@include('site.game.scriptbox')

@stop


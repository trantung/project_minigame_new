@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Type', $type->id), 'seoImage' => FOLDER_SEO_GAMETYPE . '/' . $type->id))

@section('title')
{{ $title=$type->name }}
@stop

@section('content')

<div class="box">
	<h1>Game {{ $type->name }} hay nhất</h1>
	<div id="owl1" class="owl-carousel">
		@for($i = 0; $i < $count ; $i ++)
			<div class="boxgame">
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
								{{-- @include('site.game.item-play', array('game' => $game)) --}}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endfor
	</div>
	<div class="boxgame-pagination">
		<a class="prev" id="prev1"><i class="fa fa-caret-left"></i> Trang trước</a>
		<div class="boxgame-pagenumber"><span id="numberPage1"></span>/{{ $count }}</div>
		<a class="next" id="next1">Trang sau <i class="fa fa-caret-right"></i></a>
	</div>
</div>


{{-- quang cao --}}
<div>Quang cao</div>

@include('site.game.scriptgame')

<div class="box">
	<h1>Game {{ $type->name }} mới nhất</h1>
	<div id="owl2" class="owl-carousel">
		@for($i = 0; $i < $count ; $i ++)
			<div class="boxgame">
				<div class="row">
				<?php
					$listGame = $games->orderBy('id', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
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
								{{-- @include('site.game.item-play', array('game' => $game)) --}}
							</div>
						</div>
					@endforeach
				</div>
			</div>
		@endfor
	</div>
	<div class="boxgame-pagination">
		<a class="prev" id="prev2"><i class="fa fa-caret-left"></i> Trang trước</a>
		<div class="boxgame-pagenumber"><span id="numberPage2"></span>/{{ $count }}</div>
		<a class="next" id="next2">Trang sau <i class="fa fa-caret-right"></i></a>
	</div>
</div>

@stop
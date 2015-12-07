@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('CategoryParent', 1), 'seoImage' => FOLDER_SEO_PARENT . '/' . 1))

@section('title')
{{ $title = 'Game Android'}}
@stop

@section('content')

<div class="box">
	<h1>Game Android tải nhiều</h1>
	<div id="owl1" class="owl-carousel">
		@for($i = 0; $i < $count ; $i ++)
			<div class="boxgame">
				<div class="row">
				<?php
					$listGame = $games->orderBy('count_download', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
				?>
					@foreach($listGame as $game)
						@include('site.game.gameitem', array('game' => $game))
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
<div class="adsense">Quang cao</div>

@include('site.game.scriptgame')

<div class="box">
	<h1>Game Android mới nhất</h1>
	<div id="owl2" class="owl-carousel">
		@for($i = 0; $i < $count ; $i ++)
			<div class="boxgame">
				<div class="row">
				<?php
					$listGame = $games->orderBy('id', 'desc')->take(PAGINATE_BOXGAME)->skip($i * PAGINATE_BOXGAME)->get();
				?>
					@foreach($listGame as $game)
						@include('site.game.gameitem', array('game' => $game))
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
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
						$listGame = $games->orderByRaw(DB::raw("weight_number = '0', weight_number"))
							->orderBy('count_play', 'desc')
							->take(PAGINATE_BOXGAME)
							->skip($i * PAGINATE_BOXGAME)
							->get();
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
<div class="clearfix"></div>
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
						$listGame = $games->orderBy('start_date', 'desc')
							->take(PAGINATE_BOXGAME)
							->skip($i * PAGINATE_BOXGAME)
							->get();
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
<div class="clearfix"></div>
@include('site.game.scriptbox')
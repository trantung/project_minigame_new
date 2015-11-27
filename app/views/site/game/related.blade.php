@if($games = CommonGame::getRelateGame($parentId, $limit))
<div class="box mobile">
	<h3>Game khác</h3>
	<div class="row">
		@foreach($games as $game)
			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="item">
					<div class="item-image">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" alt="{{ $game->name }}" />
							<strong>{{ $game->name }}</strong>
						</a>
					</div>
					<div class="item-play">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ getZero($game->count_play) }} lượt chơi</span><i class="play">
	<img src="/assets/images/play.png">
	</i></a>
					</div>
				</div>
			</div>
		@endforeach
	</div>
</div>
@endif
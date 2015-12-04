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
							<strong>{{ limit_text($game->name, TEXTLENGH) }}</strong>
						</a>
					</div>
					{{-- @include('site.game.item-play', array('game' => $game)) --}}
				</div>
			</div>
		@endforeach
	</div>
</div>
@endif
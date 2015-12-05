<div class="col-xs-6 col-sm-3 col-md-2">
	<div class="item">
	    <div class="item-image">
			<a href="{{ CommonGame::getUrlGame($game->slug) }}">
				<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
				@if($game->parent_id == GAMEOFFLINE)
					<div class="overlay"><i class="fa fa-download"></i></div>
				@else
					<div class="overlay"><i class="fa fa-play-circle"></i></div>
				@endif
			</a>
	    </div>
	    <div class="item-title">
			<a href="{{ CommonGame::getUrlGame($game->slug) }}">{{ limit_text($game->name, TEXTLENGH) }}</a>
		</div>
	    {{-- @include('site.game.item-play', array('game' => $game)) --}}
	</div>
</div>
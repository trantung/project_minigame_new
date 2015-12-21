<?php $url = CommonGame::getUrlGame($game); ?>
<div class="col-xs-4 col-sm-3 col-md-2">
	<div class="item">
	    <div class="item-image">
			<a href="{{ $url }}">
				<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
				@if($game->parent_id == GAMEOFFLINE)
					<a href="{{ $url }}" class="overlay"><i class="fa fa-download"></i></a>
				@else
					<a href="{{ $url }}" class="overlay"><i class="fa fa-play-circle"></i></a>
				@endif
			</a>
	    </div>
	    <div class="item-title">
			<a href="{{ $url }}">{{ limit_text($game->name, TEXTLENGH) }}</a>
		</div>
	    {{-- @include('site.game.item-play', array('game' => $game)) --}}
	</div>
</div>
@extends('site.layout.default')

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">
	<h3>{{ $game->name }}</h3>

	<!-- WEB -->
	<div class="web">
		<h1 class="title">{{ $game->name }}</h1>

		@include('site.common.rate', array('vote_average' => $game->vote_average))

		<p>{{ getZero($game->count_play) }} người chơi</p>
		<p>{{ $game->description }}</p>
		<div class="row">
			<div class="col-sm-9">
				<div class="game">
					{{ CommonGame::getLinkGame($game) }}
				</div>
			</div>
			<div class="col-sm-3">
				@include('site.game.score')
			</div>
		</div>

		<p>{{ $game->description }}</p>

		@include('site.game.vote', array('id' => $game->id))

		@include('site.game.social')

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop
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
		<img class="startitle" src="/assets/images/star.png" height="20" width="122" />
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

		@include('site.game.vote')

		@include('site.game.social')

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop
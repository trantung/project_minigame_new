@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Game', $game->id), 'seoImage' => FOLDER_SEO_GAME . '/' . $game->id))

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

		<p>{{ getZero($game->count_play) }} lượt chơi</p>
		<p>{{ $game->description }}</p>
		<div class="row">
			<div class="col-sm-9">
			<p>
				<a onclick="countplaymobile()" class="download"><i class="fa fa-play-circle-o"></i> Chơi ngay</a>
			</p>
			@include('site.game.scriptcountplay', array('id' => $game->id, 'url' => Request::url() . '?play=true'))
				
			</div>
			<div class="col-sm-3">
				@include('site.game.score', array('id' => $game->id))
			</div>
		</div>

		<div class="detail">{{ $game->description }}</div>

		@include('site.game.vote', array('id' => $game->id))

		@include('site.game.social', array('id' => $game->id))

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop
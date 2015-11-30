@extends('site.layout.default')

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">
	<h3>{{ $game->name }}</h3>

	<!-- WEB -->
	<div class="row web">

		<div class="web_avatar">
			<img alt="{{ $game->name }}" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" />
		</div>
		<div class="web_title">

			<h1 class="title">{{ $game->name }}</h1>

			@include('site.common.rate', array('vote_average' => $game->vote_average))

			<p>{{ getZero($game->count_play) }} người chơi</p>

			@include('site.game.social', array('id' => $game->id))

		</div>

		<div class="col-xs-12">
			<div class="detail">
				{{ $game->description }}
			</div>

			<p class="center">
				<a onclick="countdownload()" class="download"><i class="fa fa-download"></i> Tải về</a>
			</p>

			@include('site.game.scriptcountdownload', array('id' => $game->id, 'url' => CommonGame::getUrlDownload($game)))

			<div class="center">
				@include('site.game.vote', array('id' => $game->id))

				@include('site.game.social', array('id' => $game->id))
			</div>

		</div>

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop

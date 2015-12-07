@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Game', $game->id), 'seoImage' => FOLDER_SEO_GAME . '/' . $game->id))

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">

	@include('site.game.breadcrumbgame', array('game' => $game))

	<!-- WEB -->
	<div class="web">

		<div class="game_avatar">
			<img alt="{{ $game->name }}" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" />
		</div>
		<div class="game_title">

			<h1 class="title">{{ $game->name }}</h1>

			@include('site.common.rate', array('vote_average' => $game->vote_average))

			<p>{{ getZero($game->count_download) }} lượt tải</p>

			<div class="social-top">@include('site.game.social', array('id' => $game->id))</div>

		</div>

		<div class="detail">{{ $game->description }}</div>

		<div class="btn-block-center">
			<a onclick="countdownload()" class="download"><i class="fa fa-download"></i> Tải về</a>
		</div>

		@include('site.game.scriptcountdownload', array('id' => $game->id, 'url' => url(CommonGame::getUrlDownload($game))))

		@include('site.game.vote', array('id' => $game->id))

		@include('site.game.social', array('id' => $game->id))

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop

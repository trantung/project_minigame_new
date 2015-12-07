@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Game', $game->id), 'seoImage' => FOLDER_SEO_GAME . '/' . $game->id))

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">
	<?php
		$breadcrumb = array(
			['name' => Type::find($game->type_main)->name, 'link' => url(Type::find($game->type_main)->slug)],
			['name' => $game->name, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', $breadcrumb)

	<!-- WEB -->
	<div class="web">

		<div class="game_avatar">
			<img alt="{{ $game->name }}" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" />
		</div>
		<div class="game_title">

			<h1 class="title">{{ $game->name }}</h1>

			@include('site.common.rate', array('vote_average' => $game->vote_average))

			<p>{{ getZero($game->count_play) }} lượt chơi</p>

			<div class="social-top">@include('site.game.social', array('id' => $game->id))</div>

		</div>

		@if($game->parent_id == GAMEHTML5)
			<div class="btn-click">
				<a onclick="countplay()" class="download"><i class="fa fa-play-circle-o"></i> Chơi ngay</a>
			</div>

			@include('site.game.scriptcountplay', array('id' => $game->id, 'url' => CommonGame::getLinkPlayGameHtml5($game)))
		@endif

		@if($game->parent_id == GAMEFLASH)
			<div class="playbox">{{ CommonGame::getLinkGame($game) }}</div>
		@endif

		{{-- @include('site.game.score', array('id' => $game->id)) --}}

		<div class="detail">{{ $game->description }}</div>

		@if($game->parent_id == GAMEHTML5)
			<div class="btn-block-center">
				<a onclick="countplay()" class="download"><i class="fa fa-play-circle-o"></i> Chơi ngay</a>
			</div>
		@endif

		@include('site.game.vote', array('id' => $game->id))

		@include('site.game.social', array('id' => $game->id))

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop
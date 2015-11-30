@extends('site.layout.default')

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">
	<h3>{{ $game->name }}</h3>

	<!-- MOBILE <= 500px -->
	<div class="row mobile">

		<div class="mobile_avatar">
			<img alt="{{ $game->name }}" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $game->image_url) }}" />
		</div>
		<div class="mobile_title">

			<h1 class="title mobile-title">{{ $game->name }}</h1>

			@include('site.common.rate', array('vote_average' => $game->vote_average))

			<p>{{ getZero($game->count_play) }} người chơi</p>

		</div>

		<div class="col-xs-12">

			<div class="slideGame">
				@include('site.game.slide', array('slideId' => $game->slide_id))
			</div>

			<div class="detail">
				{{ $game->description }}
			</div>

			<p>
				<a href="{{ CommonGame::getUrlDownload($game) }}" class="download"><i class="fa fa-download"></i> Tải về</a>
			</p>

			@include('site.game.vote', array('id' => $game->id))

			@include('site.game.social', array('id' => $game->id))

		</div>

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_MOBILE))

@stop


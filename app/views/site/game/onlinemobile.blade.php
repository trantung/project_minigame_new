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
			<img class="startitle" src="/assets/images/star.png" height="20" width="122" />

			<p>{{ getZero($game->count_play) }} người chơi</p>

		</div>

	  	<div class="col-xs-12">

			<div class="imgGamedowload">
				<img alt="" src="/assets/images/taive.png" />
			</div>

			<p>{{ $game->description }}</p>
			<p>
				<a href="{{ Request::url() }}?play=true" class="download"><i class="fa fa-play-circle-o"></i> Chơi ngay</a>
			</p>

			@include('site.game.vote')

			@include('site.game.social')

	  	</div>

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_MOBILE))

@stop
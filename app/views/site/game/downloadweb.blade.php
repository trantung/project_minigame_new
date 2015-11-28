@extends('site.layout.default')

@section('title')
{{ $title = $game->name }}
@stop

@section('content')

<div class="box">
	<h3>{{ $game->name }}</h3>

	<!-- WEB -->
	<div class="row web">

		<div class="col-sm-6 imgGamedowload">
			<img alt="" src="/assets/images/taive.png" />
		</div>
		<div class="col-sm-6 ">
			<h1 class="title">{{ $game->name }}</h1>

			@include('site.common.rate', array('vote_average' => $game->vote_average))

			<p>{{ getZero($game->count_play) }} người chơi</p>
			<p>{{ $game->description }}</p>

			@include('site.game.vote', array('id' => $game->id))

			<p>
				<a href="{{ CommonGame::getUrlDownload($game) }}" class="download"><i class="fa fa-download"></i> Download</a>
			</p>

			@include('site.game.social')

			{{-- <div class="img_game_detail">
				<a href="#"><img src="/assets/images/detai_game1.png"></a>
				 &nbsp&nbsp&nbsp
				 <a href="#"><img src="/assets/images/detai_game2.png"></a>
				 &nbsp&nbsp&nbsp
				 <a href="#"><img src="/assets/images/detai_game3.png"></a>
				 &nbsp&nbsp&nbsp
				 <a href="#"><img src="/assets/images/detai_game1.png"></a>
				 &nbsp&nbsp&nbsp
				 <a href="#"><img src="/assets/images/detai_game2.png"></a>
				 &nbsp
			</div> --}}
		</div>

	</div>

	@include('site.game.comment')

</div>

@include('site.game.related', array('parentId' => $game->parent_id, 'limit' => GAME_RELATED_WEB))

@stop

@extends('site.layout.default')

@section('title')
{{ $title= 'Game bình chọn nhiền'}}
@stop

@section('content')

<!-- game play many todo -->

@if($inputGameplay)
	<div class="box">
		<h1>Game chơi nhiều nhất</h1>
		<div class="row">
			@foreach($inputGameplay as $game)
				<div class="col-xs-6 col-sm-3 col-md-2">
					<div class="item">
						<div class="item-image">
							<a href="{{ CommonGame::getUrlGame($game->slug) }}">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
								<strong>{{ $game->name }}</strong>
								
							</a>
						</div>
						<div class="item-play">
							<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ $game->count_play }} lượt chơi</span><i class="play"><img src="{{ url('/assets/images/play.png') }}"></i></a>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameplay->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>
@endif

<div class="box">
	<h1>Game bình chọn nhiều <a href="{{ action('GameController@getListGameVote') }}" class="box-more">Xem thêm</a></h1>
	<div class="row">
		@foreach($inputGameVote as $game)
			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="item">
					<div class="item-image">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
							<strong>{{ $game->name }}</strong>
							@include('site.common.rate', array('vote_average' => $game->vote_average))
						</a>
					</div>
					<div class="item-play">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ $game->count_play }} lượt chơi</span><i class="play"><img src="{{ url('/assets/images/play.png') }}"></i></a>
					</div>
				</div>
			</div>
		@endforeach
	</div>

</div>


@stop
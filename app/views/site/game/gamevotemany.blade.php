@extends('site.layout.default')

@section('title')
{{ $title= 'Game bình chọn nhiều'}}
@stop

@section('content')
<div class="box">
	<h1>Game bình chọn nhiều</h1>
	<div class="row">
		@foreach($inputGameVote as $game)
			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="item">
					<div class="item-image">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
							<strong>{{ limit_text($game->name, TEXTLENGH) }}</strong>
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

	<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameVote->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>
</div>
<!-- game play many todo -->

@if($inputGameplay)
	<div class="box">
		<h1>Game chơi nhiều nhất<a href="{{ action('GameController@getListGameplay') }}" class="box-more">Xem thêm</a></h1>
		<div class="row">
			@foreach($inputGameplay as $game)
				<div class="col-xs-6 col-sm-3 col-md-2">
					<div class="item">
						<div class="item-image">
							<a href="{{ CommonGame::getUrlGame($game->slug) }}">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
								<strong>{{ limit_text($game->name, TEXTLENGH) }}</strong>
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

@stop

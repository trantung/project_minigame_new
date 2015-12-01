@extends('site.layout.default')

@section('title')
{{ $title= 'Game Android'}}
@stop

@section('content')

<div class="box">
	<h1>Game Android</h1>
	<div class="row">

		@foreach($inputGameandroi as $game)
			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="item">
					<div class="item-image">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" alt="" />
							<strong>{{ $game->name }}</strong>
							@include('site.common.rate', array('vote_average' => $game->vote_average))
						</a>
					</div>
					<div class="item-play">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ $game->count_play }} lượt chơi</span><i class="play"><img src="assets/images/play.png"></i></a>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameandroi->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>
</div>
<!-- game play many todo -->


@stop
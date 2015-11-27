@extends('site.layout.default')

@section('title')
{{ $title=$categoryParent->name }}
@stop

@section('content')

<div class="box">
	<h1>{{ $categoryParent->name }}</h1>
	<div class="row">
		@foreach($games as $game)
			<div class="col-xs-6 col-sm-3 col-md-2">
				<div class="item">
					<div class="item-image">
						<a href="#">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" alt="" />
							<strong>{{ $game->name }}</strong>
						</a>
					</div>
					<div class="item-play">
						<a href="#"><span>{{ $game->count_play }} lượt chơi</span><i class="play"><img src="assets/images/play.png"></i></a>
					</div>
				</div>
			</div>
		@endforeach
	</div>

	{{-- <div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $games->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div> --}}

</div>

@stop
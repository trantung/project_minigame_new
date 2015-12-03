@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('CategoryParent', 1), 'seoImage' => FOLDER_SEO_PARENT . '/' . 1))

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
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
							<strong>{{ $game->name }}</strong>
							@include('site.common.rate', array('vote_average' => $game->vote_average))
						</a>
					</div>
					<div class="item-play">
						<a href="{{ CommonGame::getUrlGame($game->slug) }}"><span>{{ $game->count_download }} lượt tải</span><i class="play"><img src="{{ url('/assets/images/tai.png') }}"></i></a>
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
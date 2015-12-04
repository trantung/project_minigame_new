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
							<strong>{{ limit_text($game->name, TEXTLENGH) }}</strong>
						</a>
					</div>
					{{-- @include('site.game.item-play', array('game' => $game)) --}}
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
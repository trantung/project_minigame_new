@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Type', $type->id), 'seoImage' => FOLDER_SEO_GAMETYPE . '/' . $type->id))

@section('title')
{{ $title=$type->name }}
@stop

@section('content')

<div class="box">
	<h1>{{ $type->name }}</h1>
	<div class="row">
		@foreach($games as $game)
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
			{{ $games->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>

</div>

@if($relationModel = CommonSite::getRelationModel($type->id, 'Type'))
	<div class="box">
		<h1>{{ $relationModel->name }}<a href="{{ $relationModel->slug }}" class="box-more">Xem thêm</a></h1>
		<div class="row">
			@foreach(CommonGame::boxGameByType($relationModel) as $game)
				<div class="col-xs-6 col-sm-3 col-md-2">
					<div class="item">
						<div class="item-image">
							<a href="{{ CommonGame::getUrlGame($game->slug) }}">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
								<strong>{{ $game->name }}</strong>
							</a>
						</div>
						{{-- @include('site.game.item-play', array('game' => $game)) --}}
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endif

@stop
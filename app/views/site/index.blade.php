@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo(SEO_META)))

@section('title')
{{ $title='Trang chủ' }}
@stop

@section('content')

@if($news = CommonSite::getLatestNews())
<div class="box">
	<a class="homenews" href="{{ action('SiteNewsController@show', $news->slug) }}"><i class="fa fa-caret-right"></i> {{ $news->title }}</a>
</div>
@endif

<div class="box">
	@foreach($categoryParent as $value)
	<h3><a href="{{ url($value->slug) }}">{{ $value->name }}</a><a href="{{ url($value->slug) }}" class="box-more">Xem thêm</a></h3>
	@if($games = CommonGame::boxGameByCategoryParentIndex($value))
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
	@endif
	@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => $value->id))

	@endforeach

</div>

@stop

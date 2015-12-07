@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo(SEO_META)))

@section('title')
{{ $title='Trang chủ' }}
@stop

@section('content')

@if($news = CommonSite::getLatestNews())
<div class="box">
	<a class="homenews" href="{{ action('SiteNewsController@show', $news->slug) }}"><i class="fa fa-caret-right"></i> [{{ $news->typeNew->name }}] {{ $news->title }}</a>
</div>
@endif

<div class="box">
	@foreach($categoryParent as $value)
	<h3><a href="{{ url($value->slug) }}">{{ $value->name }}</a><a href="{{ url($value->slug) }}" class="box-more">Xem thêm</a></h3>
	@if($games = CommonGame::boxGameByCategoryParentIndex($value))
		<div class="row">
			@foreach($games as $game)
				@include('site.game.gameitem', array('game' => $game))
		  	@endforeach
		</div>
	@endif
	@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => $value->id))

	@endforeach

</div>

@stop

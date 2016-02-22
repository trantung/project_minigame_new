@extends('site.layout.default')

@section('title')
{{ $title= $newType->name }}
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => 'Tin tức', 'link' => action('SiteNewsController@index')],
		['name' => $newType->name, 'link' => '']
	);
?>
@include('site.common.bar', $breadcrumb)

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			@include('site.News.highlightType', ['newTypeId' => $newType->id])
			
			@if(count($news) > 0)
				<div class="list">
					@foreach($news as $value)
					<div class="row list-item">
						<div class="col-sm-4 list-image">
							<a href="{{ action('SiteNewsController@showDetail', [$newType->slug, $value->slug]) }}">
								<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							</a>
						</div>
						<div class="col-sm-8 list-text">
							<h3>
								<a href="{{ action('SiteNewsController@showDetail', [$newType->slug, $value->slug]) }}">
									{{ $value->title }}
								</a>
							</h3>
							<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
						</div>
					</div>
					@endforeach
				</div>

				@include('site.common.paginate', array('input' => $news))
			@endif

		</div>
	</div>
	<div class="col-sm-4">
		<div class="side">
			@include('site.common.ad', array('adPosition' => AD_NEW))
		</div>
	</div>
</div>

@include('site.common.gamebox')

@stop
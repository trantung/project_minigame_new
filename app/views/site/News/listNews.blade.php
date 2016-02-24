@extends('site.layout.default')

@section('title')
{{ $title='Danh sách tin tức' }}
@stop

@section('content')


<?php
	$breadcrumb = array(
		['name' => 'Tin tức', 'link' => ''],
	);
?>
@include('site.common.bar', $breadcrumb)

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			@include('site.common.highlight')
			
			@if(count($inputListNews) > 0)
				<div class="list">
					@foreach($inputListNews as $value)
					<div class="row list-item">
						<div class="col-xs-4 list-image">
							<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
								<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							</a>
						</div>
						<div class="col-xs-8 list-text">
							<h3>
								<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
									{{ $value->title }}
								</a>
							</h3>
							@if(getDevice() == COMPUTER)
								<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
							@endif
						</div>
					</div>
					@endforeach
				</div>
				@if($inputListNews->getTotal() >= FRONENDPAGINATE)
					@include('site.common.paginate', array('input' => $inputListNews))
				@endif
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
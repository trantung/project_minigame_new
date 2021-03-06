@extends('site.layout.default')

@section('title')
{{ $title='Danh sách tin tức' }}
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => 'Tin tức', 'link' => action('SiteNewsController@index')],
	);
?>
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'isH1' => 2])

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			@include('site.common.highlight')
			
			@if(count($inputListNews) > 0)
				<div class="list">
					@foreach($inputListNews as $value)
					<div class="row list-item">
						<div class="col-xs-4 list-image">
							<a href="{{ action('SlugController@detailData', [$value->slugType, $value->slug]) }}">
								<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							</a>
						</div>
						<div class="col-xs-8 list-text">
							<h2>
								<a href="{{ action('SlugController@detailData', [$value->slugType, $value->slug]) }}">
									{{ $value->title }}
								</a>
							</h2>
							@if(getDevice() == COMPUTER)
								<p>{{ getSapo($value->description, $value->sapo) }}</p>
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
			@if(getDevice() == MOBILE)
				<!-- @include('site.common.ads', array('adPosition' => POSITION_RIGHT)) -->
			@endif
		</div>
	</div>
</div>

@include('site.common.gamebox')

@stop
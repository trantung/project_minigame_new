@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => FOLDER_SEO_NEWS . '/' . $inputNew->id))

@section('title')
	@if($title = CommonSite::getMetaSeo('AdminNew', $inputNew->id)->title_site)
		{{ $title= $title }}
	@else
		{{ $title = $inputNew->title }}
	@endif
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => 'Tin tức', 'link' => action('SiteNewsController@index')],
		['name' => $newType->name, 'link' => action('SiteNewsController@listNews', $newType->slug)],
		['name' => $inputNew->title, 'link' => '']
	);
?>
@include('site.common.bar', $breadcrumb)

<div class="row">
	<div class="col-sm-9">
		<div class="box-main">			
			<div class="title_left">
				<h1>{{ $inputNew->title }}</h1>
				<p>{{ date('d/m/Y H:i', strtotime($inputNew->updated_at)) }}</p>
			</div>
			<div class="row">
				<div class="col-sm-9 col-sm-push-3">
					<div class="detail">
						<strong>{{ $inputNew->sapo }}</strong>
						@if(getDevice() == COMPUTER)
							@include('site.common.ads', array('adPosition' => POSITION_SAPO))
						@else
							@include('site.common.ads', array('adPosition' => POSITION_MOBILE_SAPO))
						@endif
						<div class="clearfix"></div>
						{{ $inputNew->description }}
						<div class="clearfix"></div>
						<strong class="pull-right">{{ $inputNew->author }}</strong>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3 col-sm-pull-9">
					@if(getDevice() == MOBILE)
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_RELATED))
					@endif
					
					@include('site.News.relatedNews')
					
					@include('site.News.hotNews')
					
					@if(getDevice() == COMPUTER)
						@include('site.common.ads', array('adPosition' => POSITION_NEWS_DETAIL_LEFT))
					@else
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_DETAIL_LEFT))
					@endif
				</div>
			</div>

		</div>
	</div>
	<div class="col-sm-3">
		<div class="side">
			@if(getDevice() == COMPUTER)
				@include('site.common.ads', array('adPosition' => POSITION_RIGHT))
			@endif
		</div>
	</div>
</div>

@include('site.common.gamebox')

@stop
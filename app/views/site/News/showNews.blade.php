@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => UPLOAD_NEWS . '/' . $inputNew->id, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))

@section('title')
	@if($title = CommonSite::getMetaSeo('AdminNew', $inputNew->id)->title_site)
		{{ $title = $title }}
	@else
		{{ $title = $inputNew->title }}
	@endif
@stop

@section('content')

<?php
	$breadcrumb = array(
		// ['name' => 'Tin tức', 'link' => action('SiteNewsController@index')],
		['name' => $newType->name, 'link' => action('SlugController@listData', $newType->slug)],
		['name' => $inputNew->title, 'link' => '']
	);
?>
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id])

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			<div class="title_left">
				<h1>{{ $inputNew->title }}</h1>
				<p>{{ date('d/m/Y H:i', strtotime($inputNew->updated_at)) }}</p>
			</div>
			<div class="row">
				<div class="col-sm-8 col-sm-push-4">
					<div class="detail">
						<strong>{{ $inputNew->sapo_text . $inputNew->sapo }}</strong>
						@if(getDevice() == COMPUTER)
							@include('site.common.ads', array('adPosition' => POSITION_SAPO, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
						@else
							@include('site.common.ads', array('adPosition' => POSITION_MOBILE_SAPO, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
						@endif
						<div class="clearfix"></div>
						{{ $inputNew->description }}
						<div class="clearfix"></div>
						<strong class="pull-right">{{ $inputNew->author }}</strong>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-4 col-sm-pull-8">
					@if(getDevice() == MOBILE)
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_RELATED, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
					@endif
					
					@include('site.News.relatedNews')
					
					@include('site.News.hotNews')
					
					@if(getDevice() == COMPUTER)
						@include('site.common.ads', array('adPosition' => POSITION_NEWS_DETAIL_LEFT, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id, 'sensitive' => $inputNew->sensitive))
					@else
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_DETAIL_LEFT, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id, 'sensitive' => $inputNew->sensitive))
					@endif
				</div>
			</div>

		</div>
	</div>
	<div class="col-sm-4">
		<div class="side">
			@if(getDevice() == COMPUTER)
				@include('site.common.ads', array('adPosition' => POSITION_RIGHT, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id, 'limit' => LIMIT))
			@endif
		</div>
	</div>
</div>

@include('site.common.gamebox', array('model_name' => 'AdminNew', 'model_id' => $inputNew->id))

@stop
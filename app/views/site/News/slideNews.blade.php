@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => FOLDER_SEO_NEWS . '/' . $inputNew->id, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))

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
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id])

<div class="row">
	<div class="col-sm-12">
		<div class="box-main">			
			<div class="title_left">
				<h1>{{ $inputNew->title }}</h1>
				<p>{{ date('d/m/Y H:i', strtotime($inputNew->updated_at)) }}</p>
			</div>
			<div class="row">
				<div class="col-sm-9 col-sm-push-3">
					<div class="detail">
						<strong>{{ $inputNew->sapo_text . $inputNew->sapo }}</strong>
						<div class="clearfix"></div>
						@if($inputNewSlide)
	                		<div id="slider" class="nivoSlider">
	                			@foreach($inputNewSlide as $value)
		                            <a title="">
				                        <img src="{{ url(UPLOAD_NEWS_SLIDE . '/' . $inputNew->id . '/' . $value->image_url) }}" alt="" title="{{ $value->sapo }}" />
				                    </a>
			                    @endforeach
	                        </div>
							{{ HTML::style('assets/js/nivoslider/nivo-slider.css') }}
							{{ HTML::script('assets/js/nivoslider/jquery.nivo.slider.js') }}
							<script type="text/javascript">
			                    $(window).load(function() {
			                        $("#slider").nivoSlider({
			                            animSpeed: 200,
			                            pauseTime: 3000,
			                            effect: 'slideInLeft',
			                            controlNav: false,
			                            manualAdvance: true,
			                            prevText: '<i class="fa fa-angle-left"></i>',
	    								nextText: '<i class="fa fa-angle-right"></i>',
			                        });
			                    });
		                    </script>
							<div class="margin-block clearfix"></div>
						@endif
						<div class="clearfix"></div>
						@if(getDevice() == COMPUTER)
							@include('site.common.ads', array('adPosition' => POSITION_SAPO, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
						@else
							@include('site.common.ads', array('adPosition' => POSITION_MOBILE_SAPO, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
						@endif
						<div class="clearfix"></div>
	                    {{ $inputNew->description }}
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-sm-3 col-sm-pull-9">
					@if(getDevice() == MOBILE)
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_RELATED, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
					@endif

					@include('site.News.relatedNews')
					
					@include('site.News.hotNews')

					@if(getDevice() == COMPUTER)
						@include('site.common.ads', array('adPosition' => POSITION_NEWS_DETAIL_LEFT, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
					@else
						@include('site.common.ads', array('adPosition' => POSITION_MOBILE_NEWS_DETAIL_LEFT, 'model_name' => 'AdminNew', 'model_id' => $inputNew->id))
					@endif
				</div>
			</div>

		</div>
	</div>

</div>

@include('site.common.gamebox', array('model_name' => 'AdminNew', 'model_id' => $inputNew->id))

@stop
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

                		<div id="slider" class="nivoSlider">
                            <a title="">
		                        <img src="{{ url('demo_slider/fullimage1.jpg') }}" alt="" title="asdf 1" />
		                    </a>
                            <a title="">
		                        <img src="{{ url('demo_slider/fullimage2.jpg') }}" alt="" title="asdf 2" />
		                    </a>
                            <a title="">
		                        <img src="{{ url('demo_slider/fullimage3.jpg') }}" alt="" title="asdf 3" />
		                    </a>
                            
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

	                    {{ $inputNew->description }}

					</div>
				</div>
				<div class="col-sm-3 col-sm-pull-9">
					@include('site.News.relatedNews')
					@include('site.News.hotNews')
				</div>
			</div>

		</div>
	</div>
	<div class="col-sm-3">
		<div class="side">
			@include('site.common.ad', array('adPosition' => AD_NEW))
		</div>
	</div>
</div>

@include('site.common.gamebox')

@stop
@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo(SEO_META)))

@section('title')
	@if($title = CommonSite::getMetaSeo(SEO_META)->title_site)
		{{ $title= $title }}
	@else
		{{ $title='Trang chủ' }}
	@endif
@stop

@section('content')

@include('site.common.bar')

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			@include('site.common.highlight')
			@include('site.common.home_news')
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


@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo(SEO_META), 'model_name' => NULL, 'model_id' => NULL))

@section('title')
	@if($title = CommonSite::getMetaSeo(SEO_META)->title_site)
		{{ $title= $title }}
	@else
		{{ $title='Trang chủ' }}
	@endif
@stop

@section('content')

@include('site.common.bar', array('model_name' => NULL, 'model_id' => NULL))

<div class="row">
	<div class="col-sm-12">
		@include('site.common.highlight')
	</div>
	<div class="col-sm-8">
		<div class="box-main">
			@include('site.common.home_news')
		</div>
	</div>
	<div class="col-sm-4">
		<div class="side">
			@if(getDevice() == COMPUTER)
				@include('site.common.ads', array('adPosition' => POSITION_RIGHT, 'model_name' => NULL, 'model_id' => NULL))
			@endif
		</div>
	</div>
</div>

@include('site.common.gamebox', array('model_name' => NULL, 'model_id' => NULL))

@include('site.common.gameboxmini', array('model_name' => NULL, 'model_id' => NULL))

@stop


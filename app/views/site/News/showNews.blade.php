@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => FOLDER_SEO_NEWS . '/' . $inputNew->id))

@section('title')
{{ $title= $inputNew->title }}
@stop

@section('content')

<div class="box">
	<h3>{{ $inputNew->title }}</h3>
	<div class=" ad">
		<h4><b>{{ $inputNew->title }}</b></h4>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="box-body table-responsive no-padding">
		{{ $inputNew->description }}
	</div>
	<div class="clearfix"></div>
</div>

@stop
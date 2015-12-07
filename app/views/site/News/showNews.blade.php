@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('AdminNew', $inputNew->id), 'seoImage' => FOLDER_SEO_NEWS . '/' . $inputNew->id))

@section('title')
{{ $title = $inputNew->title }}
@stop

@section('content')

<div class="box">
	<?php
		$breadcrumb = array(
			['name' => 'Tin tức', 'link' => action('SiteNewsController@index')],
			['name' => $inputNew->title, 'link' => '']
		);
	?>
	@include('site.common.breadcrumb', $breadcrumb)

	<div class="title_left">
		<h1>{{ $inputNew->title }}</h1>
	</div>
	<div class="clearfix"></div>
	<div class="detail">
		{{ $inputNew->description }}
	</div>
	<div class="clearfix"></div>
</div>

@stop
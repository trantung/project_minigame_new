@extends('site.layout.default', array('seoMeta' => CommonSite::getMetaSeo('Test'), 'seoImage' => 'test'))

@section('title')
{{ $title = 'test'}}
@stop
@section('content')
<br/>
<div class="box">
{{ Form::open(array('action' => array('TestGameController@updateTest', $game->id), 'method' => 'POST')) }}

	<div>
		<span>Weight</span>
		{{ Form::text('weight', $game->weight) }}
	</div>
	<div>
		<span>Height</span>
		{{ Form::text('height', $game->height) }}
	</div>
	<div>
		<span>Link</span>
		{{ Form::text('link', $game->link) }}
	</div>
	<div>
		{{ Form::submit('submit') }}
	</div>
{{ Form::close() }}
</div>
<div class="box">
	<div class="row">
		<div class="col-sm-8">
			<div class="tab-content gamecontent">
				<div role="tabpanel" class="tab-pane active" id="gametab">
					<div class="web">
						<div style="margin: 10px auto; width: '.$game->weight.'px; height: '.$game->height.'px;">
							<iframe name="my-iframe" id="my-iframe" width="100%" 
							src="'.$game->link.'" height="100%" scrolling="no" frameborder="0" 
							allowfullscreen="true" webkitallowfullscreen="true" 
							mozallowfullscreen="true" style="-webkit-transform: scale(1, 1);
							-o-transform: scale(1, 1);
							-ms-transform: scale(1, 1);
							transform: scale(1, 1);
							-moz-transform-origin: top left;
							-webkit-transform-origin: top left;
							-o-transform-origin: top left;
							-ms-transform-origin: top left;
							transform-origin: top left;
							frameborder: 0px;">
							</iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
@if($inputRelated)
<div class="related">
	<h3>Tin liên quan</h3>
	<ul>
		@foreach($inputRelated as $key => $value)
			@if($key == 0)
				<li>
					<a href="{{ action('SiteNewsController@showDetail', [$newType->slug, $value->slug]) }}" class="highlight-item">
						<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
						<p class="color-rgba-1">{{ $value->title }}</p>
					</a>
				</li>
			@else
				<li><a href="{{ action('SiteNewsController@showDetail', [$newType->slug, $value->slug]) }}" title="">{{ $value->title }}</a></li>
			@endif
		@endforeach
	</ul>
</div>
@endif
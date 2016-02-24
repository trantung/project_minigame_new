@if($news = NewsManager::getNewsHighlight($newTypeId))
<div class="highlight">
	<div class="row">
		@if(getDevice() == COMPUTER)
			@foreach($news as $key=>$value)
				@if($key == 0 || $key == 2)
					<div class="col-sm-8">
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<p>{{ $value->title }}</p>
						</a>
					</div>
				@else
					<div class="col-sm-4">
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<p>{{ $value->title }}</p>
						</a>
					</div>
				@endif
			@endforeach
		@else
			@foreach($news as $key=>$value)
				@if($key == 0)
					<div class="col-xs-12">
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<p>{{ $value->title }}</p>
						</a>
					</div>
				@else
					<div class="col-xs-6">
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<p>{{ $value->title }}</p>
						</a>
					</div>
				@endif
			@endforeach
		@endif
	</div>
</div>
@endif

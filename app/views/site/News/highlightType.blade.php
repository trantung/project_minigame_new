@if($news = NewsManager::getNewsHighlight($newTypeId))
<div class="highlight">
	@if(getDevice() == COMPUTER)
		<div class="row">
			<div class="col-sm-8">
				@foreach($news as $key => $value)
					@if($key == 0)
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<h2>{{ $value->title }}</h2>
						</a>
					@endif
				@endforeach
			</div>
			<div class="col-sm-4">
				@foreach($news as $key => $value)
					@if($key > 0)
						<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
							<h2>{{ $value->title }}</h2>
						</a>
					@endif
				@endforeach
			</div>
		</div>
	@else
		@foreach($news as $key => $value)
			@if($key == 0)
			<div class="row">
				<div class="col-xs-12">
					<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}" class="highlight-item">
						<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
						<h2>{{ $value->title }}</h2>
					</a>
				</div>
			</div>
			@endif
		@endforeach
	@endif
</div>
@endif

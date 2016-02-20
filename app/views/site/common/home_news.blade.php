@if($news = NewsManager::getNews())
<div class="list">
	@foreach($news as $value)
		<div class="row list-item">
			<div class="col-sm-4 list-image">
				<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
					<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
				</a>
			</div>
			<div class="col-sm-8 list-text">
				<h3>
					<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
						{{ $value->title }}
					</a>
				</h3>
				<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
			</div>
		</div>
	@endforeach
</div>
@endif
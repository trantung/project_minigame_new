@if($news = NewsManager::getHomeNews())
<div class="list">
	@foreach($news as $value)
		<div class="row list-item">
			<div class="col-xs-4 list-image">
				<a href="{{ action('SlugController@detailData', [$value->slugType, $value->slug]) }}">
					<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
				</a>
			</div>
			<div class="col-xs-8 list-text">
				<h3>
					<a href="{{ action('SlugController@detailData', [$value->slugType, $value->slug]) }}">
						{{ $value->title }}
					</a>
				</h3>
				@if(getDevice() == COMPUTER)
					<p>{{ getSapo($value->description, $value->sapo) }}</p>
				@endif
			</div>
		</div>
	@endforeach
	<div class="row">
		<div class="col-sm-12">
			<a class="seemore" href="{{ action('SiteNewsController@index') }}">Xem thêm <i class="fa fa-plus-circle"></i></a>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
@endif
@if($inputHot)
<div class="related">
	<h3>Tin đáng đọc</h3>
	<ul>
		@foreach($inputHot as $key => $value)
			@if($key == 0)
				<li>
					<a href="{{ action('SlugController@detailData', [$newType->slug, $value->slug]) }}" class="highlight-item">
						<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
						<p class="color-rgba-2">{{ $value->title }}</p>
					</a>
				</li>
			@else
				<li><a href="{{ action('SlugController@detailData', [$newType->slug, $value->slug]) }}" title="">{{ $value->title }}</a></li>
			@endif
		@endforeach
	</ul>
</div>
@endif
@if($adPosition == AD_NEW)
	@if($ads = CommonSite::getAdvertise($adPosition))
		@foreach($ads as $ad)
		<div class="adsense center">
			@if(count($ad->adsense) > 0)
				{{ $ad->adsense }}
			@else
				@if(count($ad->image_link) > 0)
					<a href="{{ $ad->image_link }}">
				@endif
					<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer/' . $ad->id . '/' . $ad->image_url) }}" alt="" />
				@if(count($ad->image_link) > 0)
					</a>
				@endif
			@endif
		</div>
		@endforeach
	@endif
@endif
@if($adPosition == HEADER || $adPosition == Footer || $adPosition == CHILD_PAGE_RELATION)
	@if($ad = CommonSite::getAdvertise($adPosition))
	
	<div class="adsense center">
		@if(count($ad->adsense) > 0)
			{{ $ad->adsense }}
		@else
			@if(count($ad->image_link) > 0)
				<a href="{{ $ad->image_link }}">
			@endif
				<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer/' . $ad->id . '/' . $ad->image_url) }}" alt="" />
			@if(count($ad->image_link) > 0)
				</a>
			@endif
		@endif
	</div>
	@endif
@endif
@if($adPosition == CHILD_PAGE)
	@if($ad = CommonSite::getAdvertise($adPosition, $modelName, $modelId))
	<div class="adsense center">
		@if(count($ad->adsense) > 0)
			{{ $ad->adsense }}
		@else
			@if(count($ad->image_link) > 0)
				<a href="{{ $ad->image_link }}">
			@endif
				<img src="{{ url(UPLOAD_ADVERTISE . '/content/' . $modelId . '/' . $ad->image_url) }}" alt="" />
			@if(count($ad->image_link) > 0)
				</a>
			@endif
		@endif
	</div>
	@endif
@endif

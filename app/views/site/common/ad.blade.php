@if($adPosition == HEADER)
	@if($ad = CommonSite::getAdvertise($adPosition))
	<div class="ad">
		@if($ad->image_link)
		<a href="{{ $ad->image_link }}">
		@endif
		<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer/' . $ad->id . '/' . $ad->image_url) }}" alt="" />
		@if($ad->image_link)
		</a>
		@endif
	</div>
	@endif
@endif
@if($adPosition == Footer)
	@if($ad = CommonSite::getAdvertise($adPosition))
	<div class="ad">
		@if($ad->image_link)
		<a href="{{ $ad->image_link }}">
		@endif
		<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer/' . $ad->id . '/' . $ad->image_url) }}" alt="" />
		@if($ad->image_link)
		</a>
		@endif
	</div>
	@endif
@endif
@if($adPosition == CHILD_PAGE)
	@if($ad = CommonSite::getAdvertise($adPosition, $modelName, $modelId))
	<div class="ad">
		@if($ad->image_link)
		<a href="{{ $ad->image_link }}">
		@endif
		<img src="{{ url(UPLOAD_ADVERTISE . '/content/' . $modelId . '/' . $ad->image_url) }}" alt="" />
		@if($ad->image_link)
		</a>
		@endif
	</div>
	@endif
@endif
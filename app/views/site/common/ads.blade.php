<?php $ads = AdCommon::getAd($adPosition); ?>
@if(count($ads) > 0)
	@foreach($ads as $ad)
	<div class="adsense center">
		@if(!empty($ad->adsense))
			{{ $ad->adsense }}
		@endif
	</div>
	@endforeach
@endif

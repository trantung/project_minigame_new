<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@if($ads)
	{{ $ads->adsense }}
@endif
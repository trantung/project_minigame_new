<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@if($ads)
	<div class="clearfix center">{{ $ads->adsense }}</div>
@endif
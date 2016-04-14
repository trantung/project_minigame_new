@if(isset($limit))
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id, $limit); ?>
@else
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@endif
@if($ads)
	@foreach($ads as $value)
		<div class="clearfix center">{{ $value->adsense }}</div>
	@endforeach
@endif

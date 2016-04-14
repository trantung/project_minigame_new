@if(isset($limit))
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id, $limit); ?>
@else
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@endif
@if($ads)
	@foreach($ads as $value)
		@if($model_name == 'AdminNew')
			<div class="clearfix center">{{ $value->adsense2 }}</div>
		@else
			<div class="clearfix center">{{ $value->adsense }}</div>
		@endif
	@endforeach
@endif

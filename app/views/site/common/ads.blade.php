@if(isset($limit))
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id, $limit); ?>
@else
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@endif
@if($ads)
	@foreach($ads as $value)
		<?php 
			if($model_name == 'AdminNew') {
				$new = AdminNew::find($model_id);
				if($new) {
					if($new->sensitive = ACTIVE) {
						$sensitive = ACTIVE;
					} else {
						$sensitive = INACTIVE;
					}
				} else {
					$sensitive = INACTIVE;
				}
			}
		?>
		@if($sensitive == ACTIVE)
			<div class="clearfix center">{{ $value->adsense2 }}</div>
		@else
			<div class="clearfix center">{{ $value->adsense }}</div>
		@endif
	@endforeach
@endif

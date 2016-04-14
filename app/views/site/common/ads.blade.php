@if(isset($limit))
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id, $limit); ?>
@else
	<?php $ads = AdCommon::getAd($adPosition, $model_name, $model_id); ?>
@endif
@if($ads)
	@foreach($ads as $key => $value)
		<?php 
			if($model_name == 'AdminNew') {
				$new = AdminNew::find($model_id);

				if($new) {
					if($new->sensitive = ACTIVE) {
						$sensitive[$key] = ACTIVE;
					} else {
						// dd($new->toArray());
						$sensitive[$key] = INACTIVE;
					}
				} else {
					$sensitive[$key] = INACTIVE;
				}
			} else {
				$sensitive[$key] = INACTIVE;
			}
		?>
		@if($sensitive[$key] == ACTIVE)
			<div class="clearfix center">{{ $value->adsense2 }}</div>
		@endif
		@if($sensitive[$key] == INACTIVE)
			<div class="clearfix center">{{ $value->adsense }}</div>
		@endif
	@endforeach
@endif

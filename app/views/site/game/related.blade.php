@if(isset($model_name))
	@if(getDevice() == COMPUTER)
		@include('site.common.ads', array('adPosition' => POSITION_GAME_RELATED, 'model_name' => $model_name, 'model_id' => $model_id))
	@else
		@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAME_RELATED, 'model_name' => $model_name, 'model_id' => $model_id))
	@endif
@endif

@if($games = CommonGame::getRelateGame($parentId, $limit, $typeId))
<div class="box mobile">
	<h3>Game khác</h3>
	<div class="row">
		@foreach($games as $game)
			@include('site.game.gameitem', array('game' => $game))
		@endforeach
	</div>
</div>
@endif
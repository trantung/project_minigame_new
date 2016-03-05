@include('site.common.ads', array('adPosition' => POSITION_GAMES_MINIGAME))
@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAMES_MINIGAME))

<div class="clearfix"></div>

<?php $data = CommonGame::getBoxMiniGame(); ?>
@if(count($data) > 0)
<div class="box">
	<h3><a href="{{ action('GameController@index') }}">Mini Game</a></h3>
	<div class="row">
		@foreach($data as $value)
			@if(count($value['games']) > 0)
				<div class="col-sm-4">
					<div class="boxmini">
						<div class="boxmini-title">
							<h3>{{ $value['type_name'] }}</h3>
							<a href="{{ url('/' . $value['type_slug']) }}">Xem thêm</a>
						</div>
						<div class="row">
							@foreach($value['games'] as $v)
								<?php $url = CommonGame::getUrlGame($v); ?>
								<div class="col-xs-4">
									<div class="item">
									    <div class="item-image">
											<a href="{{ $url }}">
												<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $v->image_url) }}" alt="{{ $v->name }}" />
											</a>
									    </div>
									    <div class="item-title">
											<a href="{{ $url }}">{{ $v->name }}</a>
										</div>
									</div>
								</div>
							@endforeach
						</div>
					</div>
				</div>

				@include('site.common.ads', array('adPosition' => POSITION_MOBILE_GAMES_TYPE))
				
			@endif
		@endforeach
	</div>
</div>
@endif
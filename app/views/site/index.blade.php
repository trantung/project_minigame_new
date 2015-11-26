@extends('site.layout.default')

@section('title')
{{ $title='Trang chủ' }}
@stop

@section('content')

<div class="box">
	@foreach($categoryParent as $value)
	<h3><a href="{{ url($value->slug) }}">{{ $value->name }}</a><a href="#" class="box-more">Xem thêm</a></h3>
	@if($games = CommonGame::boxGameByCategoryParent($value))
		<div class="row">
			@foreach($games as $game)
				<div class="col-xs-6 col-sm-3 col-md-2">
					<div class="item">
					    <div class="item-image">
							<a href="#">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $game->image_url) }}" alt="{{ $game->name }}" />
								<strong>{{ $game->name }}</strong>
							</a>
					    </div>
					    <div class="item-play">
							<a href="#"><span>{{ $game->count_play }} lượt chơi</span><i class="play">
							<img src="assets/images/play.png"></i></a>
					    </div>
					</div>
				</div>
		  	@endforeach
		</div>
	@endif
	@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => $value->id))

	@endforeach

</div>

@stop

@extends('site.layout.default')

@section('title')
{{ $title=$game->name }}
@stop

@section('content')

<div class="box">
	<h3>{{ $game->name }}</h3>

	@if(getDevice() == MOBILE)
		@include('site.game.downloadmobile')
	@else
		@include('site.game.downloadweb')
	@endif

	@include('site.game.comment')

</div>

<div class="box web">
	<h3>Game khác</h3>
	<div class="row">

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

	</div>
</div>

<div class="box mobile">
	<h3>Game khác</h3>
	<div class="row">

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-sm-3 col-md-2">
			<div class="item">
				<div class="item-image">
					<a href="#">
					<img src="images/game5.png" alt="" />
					<strong>360 Security Lite</strong>
					</a>
				</div>
				<div class="item-play">
					<a href="#"><span>555 lượt chơi</span><i class="play">
<img src="images/play.png">
</i></a>
				</div>
			</div>
		</div>

	</div>
</div>

@stop
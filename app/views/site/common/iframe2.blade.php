<style>
	body {
		font-family: Arial;
		margin: 0;
	}
	.kt-boxgame {
		background: #bf282d;
	    padding-top: 5px;
	    padding-bottom: 5px;
	    width: 670px;
	    height: 170px;
	    margin: 0 auto;
	}
	.kt-boxgame-title {
		background: #fff;
		padding: 5px 10px;
	}
	.kt-boxgame-title strong {
		color: #bf282d;
		text-transform: uppercase;
	}
	.kt-boxgame-content {
		padding-left: 10px;
		padding-right: 5px;
	}
	.kt-boxgame-item {
	    display: inline-block;
	    width: 115px;
	    padding-left: 5px;
	    vertical-align: top;
	    padding-right: 5px;
	    padding-top: 15px;
	}
	.kt-boxgame-right-images {
		
	}
	.kt-boxgame-right-images a {
		
	}
	.kt-boxgame-right-images a img {
	    width: 100%;
	    height: auto;
	    max-width: 100%;
	    border-radius: 5px;
	    border: 2px solid #fff;
	}
	.kt-boxgame-right-text {
	    text-align: center;
	    padding-top: 3px;
	    padding-bottom: 3px;
	}
	.kt-boxgame-right-text a {
        color: #fff;
	    text-decoration: none;
	    font-size: 14px;
	    text-align: center;
	    font-weight: bold;
	}

</style>
<div class="kt-boxgame">
	<div class="kt-boxgame-title">
		<strong>Game online</strong>
	</div>
	<div class="clearfix"></div>
	<div class="kt-boxgame-content">
		@if(!empty($dataList))
			@foreach($dataList as $key => $value)
				<?php $url = CommonGame::getUrlGame($value); ?>
				<div class="kt-boxgame-item">
					<div class="kt-boxgame-right-images">
						<a href="{{ $url }}" target="_blank">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" alt="{{ $value->name }}" />
						</a>
					</div>
					<div class="kt-boxgame-right-text">
						<a href="{{ $url }}" target="_blank">{{ $value->name }}</a>
					</div>
				</div>
			@endforeach
		@endif
		@if(!empty($dataListGame))
			@foreach($dataListGame as $key => $value)
				<?php $url = CommonGame::getUrlGame($value); ?>
				<div class="kt-boxgame-item">
					<div class="kt-boxgame-right-images">
						<a href="{{ $url }}" target="_blank">
							<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" alt="{{ $value->name }}" />
						</a>
					</div>
					<div class="kt-boxgame-right-text">
						<a href="{{ $url }}" target="_blank">{{ $value->name }}</a>
					</div>
				</div>
			@endforeach
		@endif
	</div>
</div>

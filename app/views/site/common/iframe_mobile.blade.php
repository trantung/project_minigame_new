{{ HTML::style('assets/css/bootstrap.min.css') }}
<style>
	.container {
	    padding-left: 5px;
	    padding-right: 5px;
	}
	.row {
	    margin-left: -5px;
	    margin-right: -5px;
	}
	.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
	    padding-left: 5px;
	    padding-right: 5px;
	}
	.kt-menu {
		/*background: #E7E7E7;*/
		background: #a02421;
	    display: block;
	    padding-left: 0;
	    overflow: hidden;
	    margin: 0;
	}
	.kt-menu li {
		float: left;
	    list-style: outside none none;
	    padding: 10px 15px;
	}
	.kt-menu li:first-child {
	    color: #fff;
	    cursor: default;
	    background-color: #a02421;
	    padding-bottom: 5px;
	    padding-top: 10px;
	    border: none;
	}
	.kt-menu li a {
		color: #333;
		font-size: 14px;;
    	text-decoration: none;
	}
	.kt-menu li:first-child a {
	    color: #fff;
	    font-weight: bold;
	    font-size: 14px;;
	    text-transform: uppercase;
	}
	.kt-menu li.kt-type {
		padding-left: 10px;
    	padding-right: 0;
	}
	.kt-menu li.kt-type a {
		border-right: 1px solid #888;
    	padding-right: 10px;
	}
	.kt-menu li:last-child a {
		border-right: none;
		font-size: 14px;;
	}
	.kt-boxgame {
		background: #a02421;
	    margin: 0 auto;
	    width: 100%;
	    height: auto;
	}
	.kt-boxgame-right > .row {
		margin-bottom: 5px;
	}
	.kt-boxgame-left a,
	.kt-boxgame-right a {
		color: #fff;
		text-decoration: none;
		font-size: 14px;;
	}
	.kt-boxgame-left {
		/*padding: 15px;*/
	}
	.kt-boxgame-left img {
		width: 100%;
		max-width: 100%;
		height: auto;
		display: block;
		border-radius: 5px;
		border: 3px solid #fff;
	}
	.kt-boxgame-left strong {
		display: block;
		font-weight: bold;
		font-size: 14px;;
		color: #fff;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.kt-boxgame-left p {
	    text-align: justify;
	    color: #fff;
	    font-size: 14px;;
	}
	.kt-boxgame-right {
		padding: 15px 5px;
	}
	.kt-boxgame-right-images img {
		width: 100%;
		max-width: 100%;
		height: auto;
		display: block;
		border-radius: 5px;
		border: 3px solid #fff;
	}
	.kt-boxgame-right-text {
		
	}
	.kt-boxgame-right-text strong {
		display: block;
	    font-weight: bold;
	    font-size: 14px;;
	    color: #fff;
	    margin-top: 3px;
	    margin-bottom: 3px;
	}
	.kt-boxgame-right-text p {
	    color: #fff;
	    font-size: 14px;;
	    line-height: 16px;
	}
	.kt-boxgame-right-text a {
		color: #fff;
	}
	.kt-content {
		padding-left: 10px;
		padding-right: 10px;
	}

	ul.kt-boxnews-list {
		padding-left: 30px;
	    padding-bottom: 0;
	    margin-bottom: 0;
	}
	ul.kt-boxnews-list li {
	    list-style: square;
	    color: #fff;
	    margin-bottom: 5px;
	}
	ul.kt-boxnews-list li a {
		font-size: 13px;
	    text-decoration: none;
	    color: #fff;
	    line-height: normal;
	}
	
</style>
<div class="kt-boxgame">
	<ul class="kt-menu">
		<li>
			<a href="{{ url('/') }}" target="_blank">Game</a>
		</li>
		<!-- @foreach(Type::whereIn('id', array(6, 11, 4, 7, 9, 5))->get() as $value) -->
			<!-- <li class="kt-type">
				<a href="{{ url('/' . $value->slug) }}" target="_blank">
					{{-- ($value->name) --}}
				</a>
			</li> -->
		<!-- @endforeach -->
	</ul>
	<div class="clearfix"></div>
	<div class="kt-content">
		<div class="row">
			<div class="col-xs-12">
				<div class="kt-boxgame-left">
					@if(!empty($dataFirst))
						<a href="{{ action('SlugController@detailData', [$dataFirst->slugType, $dataFirst->slug]) }}" target="_blank">
							<img src="{{ url(UPLOADIMG . '/news'.'/'. $dataFirst->id . '/' . $dataFirst->image_url) }}" alt="{{ $dataFirst->title }}" />
						</a>
						<strong><a href="{{ action('SlugController@detailData', [$dataFirst->slugType, $dataFirst->slug]) }}" target="_blank">{{ $dataFirst->title }}</a></strong>
						<!-- <p>
							{{-- getSapo($dataFirst->description, $dataFirst->sapo) --}}
						</p> -->
					@endif
				</div>
				<ul class="kt-boxnews-list">
					@if(!empty($dataSecond))
						@foreach($dataSecond as $value)
							<li><a href="{{ action('SlugController@detailData', [$value->slugType, $value->slug]) }}" target="_blank">{{ $value->title }}</a></li>
						@endforeach
					@endif
				</ul>
			</div>
		</div>
		
		<div class="row">
			@if(!empty($dataList))
				@foreach($dataList as $key => $value)
					<div class="col-xs-6">

						<?php $url = CommonGame::getUrlGame($value); ?>
						<div class="kt-boxgame-right-images">
							<a href="{{ $url }}" target="_blank">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" alt="{{ $value->name }}" />
							</a>
						</div>
						<div class="kt-boxgame-right-text">
							<strong><a href="{{ $url }}" target="_blank">{{ $value->name }}</a></strong>
							<!-- <p>
								{{-- getSapo($value->description, $value->sapo, TEXTLENGH_DESCRIPTION_CODE) --}}
							</p> -->
						</div>
					</div>
				@endforeach
			@endif
			@if(!empty($dataListGame))
				@foreach($dataListGame as $key => $value)
					<div class="col-xs-6">
						<?php $url = CommonGame::getUrlGame($value); ?>
						<div class="kt-boxgame-right-images">
							<a href="{{ $url }}" target="_blank">
								<img src="{{ url(UPLOAD_GAME_AVATAR . '/' .  $value->image_url) }}" alt="{{ $value->name }}" />
							</a>
						</div>
						<div class="kt-boxgame-right-text">
							<strong><a href="{{ $url }}" target="_blank">{{ $value->name }}</a></strong>
							<!-- <p>
								{{-- getSapo($value->description, $value->sapo, TEXTLENGH_DESCRIPTION_CODE) --}}
							</p> -->
						</div>
					</div>
				@endforeach
			@endif
		</div>
	</div>
</div>
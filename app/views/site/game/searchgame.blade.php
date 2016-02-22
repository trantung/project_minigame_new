@extends('site.layout.default')

@section('title')
{{ $title='Kết quả tìm kiếm' }}
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => 'Tìm kiếm', 'link' => '']
	);
?>
@include('site.common.bar', $breadcrumb)

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			<div class="list">
				@if(count($inputsearchNews) > 0)
					<div class="title_left">
						<h1>Kết quả tìm kiếm tin tức theo từ khóa "<span style='color:red;'>{{ $input['search'] }}</span>"</h1>
					</div>
					@foreach($inputsearchNews as $value)
						<div class="row list-item">
							<div class="col-sm-4 list-image">
								<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
									<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->newId . '/' . $value->image_url) }}" />
								</a>
							</div>
							<div class="col-sm-8 list-text">
								<h3>
									<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
										 {{ $value->title }}
									</a>
								</h3>
								<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
							</div>
						</div>
					@endforeach
					@if(count($inputsearchNews) >= SEARCHLIMIT && Request::segment(1) != 'tim-kiem-tin-tuc')
						<a class="clearfix btn_more" href="{{ action('SearchGameController@indexNew', $input['search']) }}">Xem thêm</a>
					@endif
					<div class="divider margintop"></div>
				@endif
				@if(count($inputsearchGame) > 0)
					<div class="title_left">
						<h1>Kết quả tìm kiếm games theo từ khóa "<span style='color:red;'>{{ $input['search'] }}</span>"</h1>
					</div>
					@foreach($inputsearchGame as $value)
						<div class="row list-item">
							<div class="col-sm-4 list-image">
								<a href="{{ CommonGame::getUrlGame($value) }}">
									<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" />
								</a>
							</div>
							<div class="col-sm-8 list-text">
								<h3>
									<a href="{{ CommonGame::getUrlGame($value) }}">
										{{ limit_text($value->name, TEXTLENGH) }}
									</a>
								</h3>
								@if($value->parent_id == GAMEOFFLINE)
									<span>{{ getZero($value->count_download) }} lượt tải</span>
								@else
									<span>{{ getZero($value->count_play) }} lượt chơi</span>
								@endif
								<p>{{ limit_text(strip_tags($value->description), TEXTLENGH_DESCRIPTION) }}</p>
							</div>
						</div>
					@endforeach
					@if(count($inputsearchGame) >= SEARCHLIMIT && Request::segment(1) != 'tim-kiem-game')
						<a class="clearfix btn_more" href="{{ action('SearchGameController@indexGame', $input['search']) }}">Xem thêm</a>
					@endif
				@endif
				@if(count($inputsearchNews) == 0 && count($inputsearchGame) == 0)
					@include('site.common.boxgame', array('inputSearch' => $input['search'], 'text' => 'kết quả nào với từ khóa'))
				@endif
			</div>
			@if(Request::segment(1) == 'tim-kiem-game')
				@include('site.common.paginate', array('input' => $inputsearchGame))
			@endif
			@if(Request::segment(1) == 'tim-kiem-tin-tuc')
				@include('site.common.paginate', array('input' => $inputsearchNews))
			@endif
		</div>
	</div>
	<div class="col-sm-4">
		<div class="side">
			@include('site.common.ad', array('adPosition' => AD_NEW))
		</div>
	</div>
</div>

@include('site.common.gamebox')

@stop

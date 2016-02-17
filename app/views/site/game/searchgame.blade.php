@extends('site.layout.default')

@section('title')
{{ $title='Tìm kiếm game' }}
@stop

@section('content')

@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => 1))
<div class="list">
	<div class="title_left">
		<h1>Kết quả tìm kiếm theo từ khóa "<span style='color:red;'>{{ $input['search'] }}</span>"</h1>
	</div>
	@if(count($inputsearchNews) > 0)
		@foreach($inputsearchNews as $value)
			<div class="list-item">
				<div class="list-image">
					<a href="{{ action('SiteNewsController@showDetail', [$value->slugType, $value->slug]) }}">
						<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->newId . '/' . $value->image_url) }}" />
					</a>
				</div>
				<div class="list-text">
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
			<a href="{{ action('SearchGameController@indexNew', $input['search']) }}">Xem thêm</a>
		@endif
	@endif
	@if(count($inputsearchGame) > 0)
		@foreach($inputsearchGame as $value)
			<div class="list-item">
				<div class="list-image">
					<a href="{{ CommonGame::getUrlGame($value) }}">
						<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" />
					</a>
				</div>
				<div class="list-text">
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
			<a href="{{ action('SearchGameController@indexGame', $input['search']) }}">Xem thêm</a>
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

@stop

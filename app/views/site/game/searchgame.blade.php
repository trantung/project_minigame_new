@extends('site.layout.default')

@section('title')
{{ $title='Tìm kiếm game' }}
@stop

@section('content')

@include('site.common.ad', array('adPosition' => CHILD_PAGE, 'modelName' => 'CategoryParent', 'modelId' => 1))

<div class="list">

	<div class="title_center">
		<h1>Kết quả tìm kiếm theo từ khóa "{{ $input['search'] }}"</h1>
	</div>

	@foreach($inputsearchGame as $value)
		<div class="list-item">
			<div class="list-image">
				<a href="{{ CommonGame::getUrlGame($value->slug) }}">
					<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" />
				</a>
			</div>
			<div class="list-text">
				<h3>
					<a href="{{ CommonGame::getUrlGame($value->slug) }}">
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
</div>

@include('site.common.paginate', array('input' => $inputsearchGame))

@stop
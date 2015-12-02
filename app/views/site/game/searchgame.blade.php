@extends('site.layout.default')

@section('title')
{{ $title='Tìm kiếm game' }}
@stop

@section('content')


<div class="ad">
		<h4>Kết quả tìm kiếm game</h4>
	</div>
@foreach($inputsearchGame as $value)
<div class="box">
	<hr/>
	<div class="table_container">
		<div class="table-row">
			<div class="col col_image_avata">
				<img class="image_avata_game" src="{{ url(UPLOADIMG . '/game_avatar'. '/' . $value->image_url) }}" />
			</div>
			<div class="col">
				<a href="#">
					<strong>{{ $value->name }}</strong>

				</a>

				</br>
				<!-- todo -->
				@include('site.common.rate', array('vote_average' => $value->vote_average))
				</br>
				{{ $value->count_play }} người chơi
				</br>
				{{ $value->description }}
			</div>
		</div>
	</div>
</div>
@endforeach
<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $inputsearchGame->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>
@stop
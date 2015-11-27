
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
			<div class="col">
				<img class="image_fb" src="{{ url(UPLOADIMG . '/game_avatar'.'/'. $value->id . '/' . $value->image_url) }}" />
			</div>
			<div class="col">					
				<a href="#">
					<strong>{{ $value->name }}</strong>
				</a>
				</br>						
				<!-- todo -->
				<img alt="" src="images/star.png" height="20" width="122" />
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
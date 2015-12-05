@extends('site.layout.default')

@section('title')
{{ $title= 'Game bình chọn nhiền'}}
@stop

@section('content')

<!-- game play many todo -->

@if($inputGameplay)
	<div class="box">
		<h1>Game chơi nhiều nhất</h1>
		<div class="row">
			@foreach($inputGameplay as $game)
				@include('site.game.gameitem', array('game' => $game))
			@endforeach
		</div>
	</div>

	<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameplay->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>
@endif

<div class="box">
	<h1>Game bình chọn nhiều <a href="{{ action('GameController@getListGameVote') }}" class="box-more">Xem thêm</a></h1>
	<div class="row">
		@foreach($inputGameVote as $game)
			@include('site.game.gameitem', array('game' => $game))
		@endforeach
	</div>

</div>
<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameVote->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>

@stop
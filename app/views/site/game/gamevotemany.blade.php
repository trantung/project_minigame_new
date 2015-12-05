@extends('site.layout.default')

@section('title')
{{ $title = 'Game bình chọn nhiều'}}
@stop

@section('content')
<div class="box">
	<h1>Game bình chọn nhiều</h1>
	<div class="row">
		@foreach($inputGameVote as $game)
			@include('site.game.gameitem', array('game' => $game))
		@endforeach
	</div>

	<div class="row">
		<div class="col-xs-12">
			<ul class="pagination">
			{{ $inputGameVote->appends(Request::except('page'))->links() }}
			</ul>
		</div>
	</div>
</div>
<!-- game play many todo -->

@if($inputGameplay)
	<div class="box">
		<h1>Game chơi nhiều nhất<a href="{{ action('GameController@getListGameplay') }}" class="box-more">Xem thêm</a></h1>
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

@stop

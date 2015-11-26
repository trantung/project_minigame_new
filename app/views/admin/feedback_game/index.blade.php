@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý báo lỗi game' }}
@stop

@section('content')
@include('admin.feedback_game.search')
<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Quản lý báo lỗi game</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên Game</th>
			  <th>Nội dung báo lỗi</th>
			  <th>Thời gian báo lỗi</th>
			  <th>Device</th>
			  <th>Ip</th>
			  <th style="width:200px;">Action</th>
			</tr>
			 @foreach($inputFeedbackGame as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ Game::find($value->game_id)->name }}</td>
			  <td>{{ $value->description }}</td>
			  <td>{{ $value->created_at }}</td>
			  <td>{{ $value->device }}</td>
			  <td>{{ $value->ip }}</td>
			  <td>
			  	@if($value->status == ACTIVE )
				<a href="{{  action('FeedbackGameController@edit', $value->id) }}" class="btn btn-danger">Hủy kích hoạt</a>
				@else
				<a href="{{  action('FeedbackGameController@edit', $value->id) }}" class="btn btn-primary">Kích hoạt</a>
				@endif
				{{ Form::open(array('method'=>'DELETE', 'action' => array('FeedbackGameController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
				{{ Form::close() }}
			  </td>
			</tr>
			@endforeach
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		<!-- phan trang -->
		{{ $inputFeedbackGame->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


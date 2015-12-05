@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý điểm' }}
@stop

@section('content')
@include('admin.score.search')
<!-- inclue Search form 

-->
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách điểm</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Game</th>
			  <th>Điểm</th>
			  <th>Tài khoản</th>
			  <th>Thời gian</th>
			</tr>
			@foreach($inputScore as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ Game::find($value->game_id)->name }}</td>
			  <td>{{ $value->score }}</td>
			  <td>{{ User::find($value->user_id)->user_name  }}</td>
			  <td>{{ $value->created_at }}</td>
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
		{{ $inputScore->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý game' }}
@stop

@section('content')

<!-- inclue Search form-->
@include('admin.game.search')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminGameController@create') }}" class="btn btn-primary">Thêm game</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách game</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên game</th>
			  <th>Category</th>
			  <th>Lượt tải</th>
			  <th>Lượt chơi</th>
			  <th>Lượt xem</th>
			  <th>Bình chọn</th>
			  <th>Ngày sửa</th>
			  <th>Ngày tạo</th>
			  <th style="width:120px;">&nbsp;</th>
			</tr>
		 	@foreach($data as $key => $value)
				<tr>
				  	<td>{{ $value->id }}</td>
				  	<td>{{ $value->name }}</td>
				  	<td>{{ Game::where('id', $value->parent_id)->first()->name; }}</td>
				  	<td>{{ $value->count_download }}</td>
				  	<td>{{ $value->count_play }}</td>
				  	<td>{{ $value->count_download }}</td>
				  	<td>{{ $value->count_download }}</td>
				  	<td>{{ $value->created_at }}</td>
				  	<td>{{ $value->updated_at }}</td>
				  	<td>
					  	{{-- <a href="#" class="btn btn-success">Xem</a> --}}
						<a href="{{ action('AdminGameController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
						{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminGameController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


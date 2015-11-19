@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý game' }}
@stop

@section('content')

<script>
	function toggle(source) {
		checkboxes = document.getElementsByName('game_id[]');
		for(var i=0, n=checkboxes.length;i<n;i++) {
			checkboxes[i].checked = source.checked;
		}
	}
</script>

<!-- inclue Search form-->
@include('admin.game.search')

{{ Form::open(array('action' => 'AdminGameController@index', 'method' => 'PUT')) }}

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminGameController@create') }}" class="btn btn-primary">Thêm game</a>
		<a href="{{ action('AdminGameController@destroy') }}" class="btn btn-primary">Xóa</a>
		<input type="submit" value="Cập nhật" class="btn btn-success" />
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
				<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
				<th>ID</th>
				<th>Tên game</th>
				<th>Mức ưu tiên</th>
				<th>Category</th>
				<th>Lượt xem</th>
				<th>Lượt chơi</th>
				<th>Bình chọn</th>
				<th>Lượt tải</th>
				<th>Trạng thái</th>
				<th>Ngày tạo</th>
				<th style="width:120px;">&nbsp;</th>
			</tr>
			@foreach($data as $key => $value)
				<tr>
					<td><input type="checkbox" name="game_id[]" value="{{ $value->id }}" /></td>
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>
					<td><input type="text" name="weight_number" value="{{ $value->weight_number }}" style="width: 50px; text-align: center;" /></td>
					<td>{{ Game::find($value->id)->parent_id }}</td>
					<td>{{ $value->count_view }}</td>
					<td>{{ $value->count_play }}</td>
					<td>{{ $value->count_vote }}</td>
					<td>{{ $value->count_download }}</td>
					<td>{{ Form::select('status', selectStatusGame(), $value->status, array('class' =>'form-control')) }}</td>
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

{{ Form::close() }}

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $data->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


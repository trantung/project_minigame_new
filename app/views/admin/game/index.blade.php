@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý game' }}
@stop

@section('content')

{{-- //script for index game --}}
@include('admin.game.scriptindex')

<!-- inclue Search form-->
@include('admin.game.search')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminGameController@create') }}" class="btn btn-primary">Thêm game</a>
		<a onclick="deleteSelected();" class="btn btn-primary">Xóa</a>
		<a onclick="updateIndexData();" class="btn btn-success">Cập nhật</a>
	</div>
</div>
@endif

<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Danh sách game<strong id="abc"></strong></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
			<tr>
				@if(Admin::isAdmin())
				<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
				@endif
				<th>ID</th>
				<th>Tên game</th>
				<th>Mức ưu tiên</th>
				<th>Category</th>
				<th>Lượt xem</th>
				<th>Lượt chơi</th>
				<th>Bình chọn</th>
				<th>Lượt tải</th>
				<th>Trạng thái</th>
				<th>Ngày đăng</th>
				<th style="width:200px;">&nbsp;</th>
			</tr>
			@foreach($data as $key => $value)
				<tr>
					@if(Admin::isAdmin())
					<td><input type="checkbox" class="game_id" name="game_id[]" value="{{ $value->id }}" /></td>
					@endif
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>
					@if(Admin::isAdmin())
					<td><input type="text" name="weight_number[]" value="{{ $value->weight_number }}" style="width: 50px; text-align: center;" /></td>
					@else
					<td>{{ $value->weight_number }}</td>
					@endif
					<td>{{ Game::find($value->id)->parent_id }}</td>
					<td>{{ $value->count_view }}</td>
					<td>{{ $value->count_play }}</td>
					<td>{{ $value->count_vote }}</td>
					<td>{{ $value->count_download }}</td>
					@if(Admin::isAdmin())
					<td>{{ Form::select('statusGame[]', selectStatusGame(), $value->status, array('class' =>'form-control')) }}</td>
					@else
					<td>{{ getStatusGame($value->status) }}</td>
					@endif
					<td>{{ $value->start_date }}</td>
					<td>
						<a href="{{ action('AdminGameController@history', $value->id) }}" class="btn btn-success">Lịch sử</a>
						<a href="{{ action('AdminGameController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
						@if(Admin::isAdmin())
						{{ Form::open(array('method'=>'DELETE', 'action' => array('AdminGameController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
						<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
						{{ Form::close() }}
						@endif
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


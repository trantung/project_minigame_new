@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý game trong box nhúng' }}
@stop

@section('content')

{{-- //script for index game --}}
@include('admin.gamebox.scriptindex')

<!-- inclue Search form-->
@include('admin.gamebox.search')

@if(Admin::isAdmin() || Admin::isEditor())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a onclick="updateIndexSelected();" class="btn btn-danger">Loại bỏ khỏi box game nhúng</a>
		<a href="{{ action('AdminGameBoxController@exportGameBoxHtml') }}" class="btn btn-primary">Tạo mã nhúng</a>
	</div>
</div>
@endif
<div class="row">
    <div class="col-xs-12">
        <ul class="pagination">
        {{ $data->appends(Request::except('page'))->links() }}
        </ul>
    </div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			@if($data)
			<strong>Tổng số game: {{ $data->getTotal() }}</strong><br>
			@endif
			<h3 class="box-title">Danh sách game trong box nhúng<strong id="abc"></strong></h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover">
			<tr>
				<th><input type="checkbox" id="checkall" onClick="toggle(this)" /></th>
				<th>ID</th>
				<th>Tên game</th>
				<th>Category</th>
				<th>Trạng thái</th>
				<th>Ngày đăng</th>
				<th style="width:200px;">&nbsp;</th>
			</tr>
			@foreach($data as $key => $value)
				<tr>
					<td><input type="checkbox" class="game_id" name="game_id[]" value="{{ $value->id }}" /></td>
					<td>{{ $value->id }}</td>
					<td>{{ $value->name }}</td>
					@if($value->type_main)
						<td>{{ Game::find($value->parent_id)->name.'-'.Type::find($value->type_main)->name }}</td>
					@else
						<td>{{ Game::find($value->parent_id)->name }}</td>
					@endif
					<td>{{ getStatusGame($value->status) }}</td>
					<td>
					@if($value->start_date >= Carbon\Carbon::now())
						<span style="color: red;">{{ $value->start_date }}</span>
					@else
						{{$value->start_date}}
					@endif
					</td>
					<td>
						<a href="{{ action('AdminGameBoxController@remove', $value->id) }}" class="btn btn-danger">Loại bỏ</a>
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


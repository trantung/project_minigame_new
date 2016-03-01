@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý phân trang tin' }}
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách phân trang</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên loại phân trang</th>
			  <th>Số</th>
			</tr>
		 	@foreach($datas as $value)
				<tr>
					<td>{{ $value->id }}</td>
					<td>{{ getNamePaginate($value->status) }}</td>
					<td>{{ $value->paginate_number }}</td>
					<td>
					<a href="{{ action('AdminPaginateController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
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


@stop


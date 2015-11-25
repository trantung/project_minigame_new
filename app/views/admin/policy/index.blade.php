@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý Chính sách liên hệ' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('CategoryController@create') }}" class="btn btn-primary">Thêm chính sách liên hệ</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách chính sách liên hê</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tiêu đề</th>
			  <th>Mô tả</th>
			  <th>Thể loại</th>			  
			  <th>Trạng thái</th>	
			  <th style="width:200px;">Action</th>
			</tr>
			 @foreach($inputpolicy as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->title }}</td>
			  <td>{{ $value->description }}</td>
			  <td>{{ $value->type_policy }}</td>			
			  <td>{{ $value->status }}</td>
			  <td>
				<a href="{{ action('CategoryController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
				{{ Form::open(array('method'=>'DELETE', 'action' => array('CategoryController@destroy', $category->id), 'style' => 'display: inline-block;')) }}
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
		{{ $inputpolicy->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


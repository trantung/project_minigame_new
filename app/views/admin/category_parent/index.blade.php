@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý cây thư mục' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('CategoryParentController@create') }}" class="btn btn-primary">Thêm chuyên mục</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách chuyên mục</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên chuyên mục</th>
			  <th>Tổng số thể loại</th>
			  <th>Tổng số game</th>			  
			  <th style="width:200px;">Action</th>
			</tr>
			@foreach($categoryParents as $categoryParent)
				<tr>
				  	<td>{{ $categoryParent->id }}</td>
					<td>{{ $categoryParent->name }}</td>
					<td>{{ countType($categoryParent->id) }}</td>
					<td>{{ countParentGame($categoryParent->id) }}</td>
					<td>
						<a href="{{ action('CategoryParentController@edit', $categoryParent->id) }}" class="btn btn-primary">Sửa</a>
						{{ Form::open(array('method'=>'DELETE', 'action' => array('CategoryParentController@destroy', $categoryParent->id), 'style' => 'display: inline-block;')) }}
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
		{{ $categoryParents->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


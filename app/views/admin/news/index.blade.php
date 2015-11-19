@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý tin' }}
@stop

@section('content')
@include('admin.news.search')
<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('NewsController@create') }}" class="btn btn-primary">Thêm mới tin</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách loại tin</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tiêu đề</th>
			  <th>Thể loại</th>
			  <th style="width:200px;">Adcion</th>
			</tr>
			 @foreach($inputNew as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->title }}</td>
			  <td>{{ AdminNew::find($value->id)->typeNew->name }}</td>
			  <td>
				<a href="{{  action('NewsController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</button>
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
		{{ $inputNew->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


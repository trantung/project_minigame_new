@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý SEO' }}
@stop

@section('content')
<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('SeoController@create') }}" class="btn btn-primary">Thêm Seo</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách Seo</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			 
			  <th>ID</th>
			  <th>Header</th>
			  <th>Footer</th>
			  <th>Thời gian tạo</th>
			  <th style="width:200px;">Action</th>
			</tr>
			 @foreach($inputSeo as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{ $value->header_script }}</td>
			  <td>{{ $value->footer_script }}</td>
			  <td>{{ $value->created_at }}</td>
			  <td>
			  	@if($value->status == ACTIVE )
				<a href="{{  action('SeoController@edit', $value->id) }}" class="btn btn-danger">DeActive</a>
				@else
				<a href="{{  action('SeoController@edit', $value->id) }}" class="btn btn-primary">Active</a>
				@endif
				{{ Form::open(array('method'=>'DELETE', 'action' => array('SeoController@destroy', $value->id), 'style' => 'display: inline-block;')) }}
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
		{{ $inputSeo->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


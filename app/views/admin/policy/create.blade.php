@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới bài viết chính sách' }}
@stop

@section('content')
@include('admin.seo.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('PolicyController@store'), 'files'=> true)) }}
			<div class="box-body">
				<div class="form-group">
				  	<label for="name">Tiêu đề</label>
				  	<div class="row">
						<div class="col-sm-12">
						   {{ Form::tex('title', null , textParentCategory('Nhập tiêu đề')) }}
						</div>
				  </div>
				</div>
				<div class="form-group">
				  	<label for="name">SEO Footer</label>
				  	<div class="row">
						<div class="col-sm-12">
						   {{ Form::textarea('footer_script', null , textParentCategory('Nhập script seo footer vào đây')) }}
						</div>
				  </div>
				</div>
			</div>

			  <!-- /.box-body -->

			  <div class="box-footer">
				{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			  </div>
			{{ Form::close() }}
		  </div>
		  <!-- /.box -->
	</div>
</div>
@stop

@extends('admin.layout.default')

@section('title')
{{ $title='Cập nhật tin' }}
@stop

@section('content')

@include('admin.news.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsController@update', $inputNew->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="title">Tiêu đề</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::text('title', $inputNew->title , textParentCategory('Tiêu đề tin')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Thể loại tin</label>
					<div class="row">
						<div class="col-sm-6">
						   {{  Form::select('type_new_id', returnList('TypeNew'), $inputNew->type_new_id ,array('class' => 'form-control' )) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="image_url">Upload ảnh tin</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url') }}
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $inputNew->id . '/' . $inputNew->image_url) }}" />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Nội dung tin</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::textarea('description', $inputNew->description  , array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="start_date">Ngày xuất bản</label>
					<div class="row">
						<div class="col-sm-6">
						   <input type="text" class="form-control" name="start_date" value="{{ $inputNew->start_date }}" id="start_date">
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-sm-6">
						<hr />
						<h1>SEO META</h1>
						{{-- include common/meta.blade.php --}}
						@include('admin.common.meta', array('inputSeo' => $inputSeo, 'pathToImageSeo' => UPLOADIMG . '/'.FOLDER_SEO_NEWS.'/'. $inputNew->id . '/'))
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
@include('admin.common.ckeditor')
@stop

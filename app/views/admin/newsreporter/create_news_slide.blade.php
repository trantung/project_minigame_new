@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới tin' }}
@stop

@section('content')

@include('admin.newsreporter.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsReporterController@store_slide'), 'files'=> true)) }}
				<div class="box-body">
					<div class="form-group">
						<label for="title">Tiêu đề</label>
						<div class="row">
							<div class="col-sm-6">
							   {{ Form::text('title', null , textParentCategory('Tiêu đề tin')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Tác giả</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('author', null, textParentCategory('Tác giả')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Hình tin ảnh</label>
						<div class="row">
							<div class="col-sm-3">								
								{{ Form::file('image_urls[]', array('id' => 'image_url', 'multiple' => true)) }}
							</div>
							<div class="col-sm-3">
							 	{{ Form::submit('Đồng ý', array('class' => 'btn btn-primary')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="name">Chuyên mục tin</label>
						<div class="row">
							<div class="col-sm-6">
							   {{  Form::select('type_new_id', returnListReporter('TypeNew'),null,array('class' => 'form-control' )) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="image_url">Ảnh đại diện(640x410)</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::file('image_url') }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Nguồn</label>
						<div class="row">
							<div class="col-sm-6">
								{{ Form::text('sapo_text', SAPO_TEXT, textParentCategory('Nguồn')) }}
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="sapo">Mô tả ngắn</label>
						<div class="row">
							<div class="col-sm-12">
								 {{ Form::textarea('sapo', null , array('placeholder' => 'Mô tả ngắn','maxlength' => 250,'rows' => 4,'class' => 'form-control' )) }}
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<hr />
							<h1>SEO META</h1>
							{{-- include common/meta.blade.php --}}
							@include('admin.common.meta')
						</div>
						<div class="col-sm-6"></div>
					</div>

					<!-- /.box-body -->
					<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
					</div>

				</div>
			{{ Form::close() }}
		  	<!-- /.box -->
	  	</div>
	</div>
</div>
@include('admin.common.ckeditor')
@stop

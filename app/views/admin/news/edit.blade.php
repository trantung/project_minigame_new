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
				<div class="form-group">
					<label for="metaname"><u>Thẻ meta</u></label>
					<div class="box-body">
						<div class="form-group">
							<label for="title_site">Thẻ title</label>
							{{ Form::text('title_site', $inputSeo->title_site ,textParentCategory('Thẻ title')) }}
						</div>
						<div class="form-group">
							<label for="description_site">Thẻ Descript site</label>
							{{ Form::textarea('description_site', $inputSeo->description_site , textParentCategory('Thẻ Descript site')) }}
						</div>
						<div class="form-group">
							<label for="keyword_site">Thẻ Keyword</label>
							{{ Form::text('keyword_site', $inputSeo->keyword_site , textParentCategory('Thẻ Keyword')) }}
						</div>
						<div class="form-group">
							<label for="title_fb">Thẻ title facebook</label>
							{{ Form::text('title_fb', $inputSeo->title_fb , textParentCategory('Thẻ facebook')) }}
						</div>
						<div class="form-group">
							<label for="description_fb">Thẻ descript facebook</label>
							{{ Form::textarea('description_fb', $inputSeo->description_fb , textParentCategory('Thẻ descript facebook')) }}
						</div>
						<div class="form-group">
							<label for="image_url_fb">Upload ảnh</label>
							{{ Form::file('image_url_fb') }}
							<img class="image_fb" src="{{ url(UPLOADIMG . '/'.FOLDER_SEO_NEWS.'/'. $inputNew->id . '/' . $inputSeo->image_url_fb) }}" />
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
@include('admin.common.ckeditor')
@stop

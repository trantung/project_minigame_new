@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới thể loại tin' }}
@stop

@section('content')

@include('admin.news.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsController@store'), 'files'=> true)) }}
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
					<label for="name">Thể loại tin</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{  Form::select('type_new_id', returnList('TypeNew'),null,array('class' => 'form-control' )) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="image_url">Upload ảnh tin</label>
					<div class="row">
						<div class="col-sm-6">	
							{{ Form::file('image_url') }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="description">Nội dung tin</label>
					<div class="row">
						<div >	                  	
						   {{ Form::textarea('description', '' , array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="start_date">Ngày xuất bản</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   <input type="text" class="form-control" name="start_date" id="start_date">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="metaname"><u>Thẻ meta</u></label>
					<div class="box-body">
						<div class="form-group">
							<label for="title_site">Thẻ title</label>
							{{ Form::text('title_site','',textParentCategory('Thẻ title')) }}
						</div>
						<div class="form-group">
							<label for="description_site">Thẻ Descript site</label>
							{{ Form::textarea('description_site', null , textParentCategory('Thẻ Descript site')) }}
						</div>
						<div class="form-group">
							<label for="keyword_site">Thẻ Keyword</label>
							{{ Form::text('keyword_site', null , textParentCategory('Thẻ Keyword')) }}
						</div>
						<div class="form-group">
							<label for="title_fb">Thẻ title facebook</label>
							{{ Form::text('title_fb', null , textParentCategory('Thẻ facebook')) }}
						</div>
						<div class="form-group">
							<label for="description_fb">Thẻ descript facebook</label>
							{{ Form::textarea('description_fb', null , textParentCategory('Thẻ descript facebook')) }}
						</div>
						<div class="form-group">
							<label for="image_url_fb">Upload ảnh</label>
							{{ Form::file('image_url_fb') }}
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

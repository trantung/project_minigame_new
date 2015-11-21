@extends('admin.layout.default')

@section('title')
{{ $title='Sửa thể loại game' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('GameTypeController@index') }}" class="btn btn-success">Danh sách thể loại game</a>
		@if(!Admin::isSeo())
		<a href="{{ action('GameTypeController@create') }}" class="btn btn-primary">Thêm thể loại game</a>
		@endif
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('GameTypeController@update', $inputType->id), 'method' => 'PUT', 'files' => true)) }}
				<div class="row">
					<div class="col-sm-6">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Tên thể loại game</label>
								{{ Form::text('name', $inputType->name , textParentCategory('Tên thể loại game')) }}
							</div>
							<div class="form-group">
								<label for="metaname"><u>Thẻ meta</u></label>
								<div class="box-body">
									<div class="form-group">
										<label for="title_site">Thẻ title</label>
										{{ Form::text('title_site', $inputSeo->title_site ,textParentCategory('Thẻ title', true)) }}
									</div>
									<div class="form-group">
										<label for="description_site">Thẻ Descript site</label>
										{{ Form::textarea('description_site', $inputSeo->description_site , textParentCategory('Thẻ Descript site', true)) }}
									</div>
									<div class="form-group">
										<label for="keyword_site">Thẻ Keyword</label>
										{{ Form::text('keyword_site', $inputSeo->keyword_site , textParentCategory('Thẻ Keyword', true)) }}
									</div>
									<div class="form-group">
										<label for="title_fb">Thẻ title facebook</label>
										{{ Form::text('title_fb', $inputSeo->title_fb , textParentCategory('Thẻ facebook', true)) }}
									</div>
									<div class="form-group">
										<label for="description_fb">Thẻ descript facebook</label>
										{{ Form::textarea('description_fb', $inputSeo->description_fb , textParentCategory('Thẻ descript facebook', true)) }}
									</div>
									<div class="form-group">
										<label for="image_url_fb">Upload ảnh</label>
										{{ Form::file('image_url_fb') }}
										<img class="image_fb" src="{{ url(UPLOADIMG . '/'.FOLDER_SEO_GAMETYPE.'/'. $inputType->id . '/' . $inputSeo->image_url_fb) }}" />
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
				{{ Form::close() }}
			</div>
			<!-- /.box -->
	</div>
</div>

@stop

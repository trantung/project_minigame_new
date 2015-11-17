@extends('admin.layout.default')

@section('title')
{{ $title='Sửa game' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminGameController@index') }}" class="btn btn-success">Danh sách game</a>
		<a href="{{ action('AdminGameController@create') }}" class="btn btn-primary">Thêm game</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('AdminGameController@update', $inputType->id), 'method' => 'PUT', 'files' => true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Tên game</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::text('name', $inputType->name , textParentCategory('Tên game')) }}

								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="metaname"><u>Thẻ meta</u></label>
							<div class="box-body">
								<div class="form-group">
									<label for="title_site">Thẻ title</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('title_site', $inputSeo->title_site ,textParentCategory('Thẻ title')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="description_site">Thẻ Descript site</label>
										<div class="row">
												<div class="col-sm-6">
												 {{ Form::text('description_site', $inputSeo->description_site , textParentCategory('Thẻ Descript site')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="keyword_site">Thẻ Keyword</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('keyword_site', $inputSeo->keyword_site , textParentCategory('Thẻ Keyword')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="title_fb">Thẻ title facebook</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('title_fb', $inputSeo->title_fb , textParentCategory('Thẻ facebook')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="description_fb">Thẻ descript facebook</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('description_fb', $inputSeo->description_fb , textParentCategory('Thẻ descript facebook')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
								<label for="image_url_fb">Upload ảnh</label>
									<div class="row">
											<div class="col-sm-6">
													{{ Form::file('image_url_fb') }}
											</div>
											<div class="col-sm-6">
												<img class="image_fb" src="{{ UPLOADIMG_GAMETYPE . '/seo'.'/'. $inputType->id . '/' . $inputSeo->image_url_fb }}" />
											</div>
									</div>
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

@extends('admin.layout.default')
@if(!Admin::isSeo())
@section('title')
{{ $title='Thêm thể loại game' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('GameTypeController@index') }}" class="btn btn-success">Danh sách thể loại game</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('GameTypeController@store'), 'files' => true)) }}
				<div class="row">
					<div class="col-sm-6">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Tên thể loại</label>
								{{ Form::text('name', '' , textParentCategory('Tên thể loại game')) }}
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
@endif
@stop

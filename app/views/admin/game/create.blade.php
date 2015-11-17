@extends('admin.layout.default')

@section('title')
{{ $title='Thêm game' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdminGameController@index') }}" class="btn btn-success">Danh sách game</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('AdminGameController@store'), 'files' => true)) }}
					<div class="box-body">
						<div class="form-group">
							<label for="name">Tên game</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::text('name', null , textParentCategory('Tên game')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="image_url_fb">Upload avatar</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::file('image_url') }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="name">Mô tả</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::textarea('description', null , textParentCategory('Mô tả')) }}
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="image_url_fb">Upload game</label>
							<div class="row">
								<div class="col-sm-6">
									{{ Form::file('link_upload_game') }}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="image_url_fb">Define game</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::text('link_url', null , textParentCategory('Define game')) }}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="image_url_fb">Mức ưu tiên</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="image_url_fb">Cơ chế lưu điểm</label>
							<div class="row">
								<div class="col-sm-6">
									 {{ Form::select('score_status', saveScore()) }}
								</div>
							</div>
						</div>

						<div class="form-group">
			                <label>Ngày đăng</label>
			                <div class="row">
								<div class="col-sm-6">
			                  		<input type="text" class="form-control" name="start_date" id="start_date">
			                	</div>
			                </div>
		              	</div>

						<hr />
						<h1>SEO</h1>
						<div class="form-group">
							<label for="metaname"><u>Thẻ meta</u></label>
							<div class="box-body">
								<div class="form-group">
									<label for="title_site">Thẻ title</label>
									<div class="row">
										<div class="col-sm-6">
											{{ Form::text('title_site','',textParentCategory('Thẻ title')) }}
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for="description_site">Thẻ Descript site</label>
										<div class="row">
												<div class="col-sm-6">
												 {{ Form::textarea('description_site', null , textParentCategory('Thẻ Descript site')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="keyword_site">Thẻ Keyword</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('keyword_site', null , textParentCategory('Thẻ Keyword')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="title_fb">Thẻ title facebook</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::text('title_fb', null , textParentCategory('Thẻ facebook')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="description_fb">Thẻ descript facebook</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::textarea('description_fb', null , textParentCategory('Thẻ descript facebook')) }}
												</div>
										</div>
								</div>
								<div class="form-group">
									<label for="image_url_fb">Upload ảnh</label>
										<div class="row">
												<div class="col-sm-6">
													{{ Form::file('image_url_fb') }}
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

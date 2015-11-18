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
			{{ Form::open(array('action' => array('AdminGameController@update', $inputGame->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="row">
				<div class="col-sm-6">
					<div class="box-body">
						<div class="form-group">
							<label for="name">Tên game</label>
							{{ Form::text('name', $inputGame->name , textParentCategory('Tên game')) }}
						</div>
						<div class="form-group">
			                <label>Chọn category</label>
			                {{ Form::select('parent_id', Game::where('parent_id', NULL)->lists('name', 'id'), $inputGame->parent_id, array('class' => 'form-control')) }}
		              	</div>
						<div class="form-group">
							<label for="">Upload avatar</label>
							{{ Form::file('image_url') }}
							<img class="image_fb" src="{{ url(UPLOAD_GAME_AVATAR . '/' . $inputGame->image_url) }}" />
						</div>
						<div class="form-group">
							<label for="name">Mô tả</label>
							{{ Form::textarea('description', $inputGame->description, array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
						</div>
						<div class="form-group">
							<label for="">Upload game</label>
							{{ Form::file('link_upload_game') }}
							<strong>{{ $inputGame->link_upload_game }}</strong>
						</div>

						<div class="form-group">
							<label for="">Define game</label>
							{{ Form::text('link_url', $inputGame->link_url , textParentCategory('Define game')) }}
						</div>

						<div class="form-group">
							<label for="">Mức ưu tiên</label>
							{{ Form::text('weight_number', $inputGame->weight_number , textParentCategory('Mức ưu tiên')) }}
						</div>

						<div class="form-group">
							<label for="">Cơ chế lưu điểm</label>
							{{ Form::select('score_status', saveScore(), $inputGame->score_status, array('class' => 'form-control')) }}
						</div>

						<div class="form-group">
			                <label>Ngày đăng</label>
			                <input type="text" class="form-control" name="start_date" id="start_date" value="{{ $inputGame->start_date }}">
		              	</div>

		              	<div class="form-group">
			                <label>Slide</label>
			                {{ Form::select('slide') }}
		              	</div>

						<hr />
						<h1>SEO</h1>
						<div class="form-group">
							<label for="metaname"><u>Thẻ meta</u></label>
							<div class="box-body">
								<div class="form-group">
									<label for="title_site">Thẻ title</label>
									{{ Form::text('title_site', $inputSeo->title_site,textParentCategory('Thẻ title')) }}
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
									<img class="image_fb" src="{{ url(UPLOADIMG . '/'.FOLDER_SEO_GAME.'/'. $inputGame->id . '/' . $inputSeo->image_url_fb) }}" />
								</div>
							</div>
						</div>
					</div>
					<!-- /.box-body -->
				</div>
				<div class="col-sm-6">
					<div class="box-body table-responsive">
						<h4>Chọn thể loại game</h4>
						<div class="overflow-box">
							<table class="table table-bordered">
								<tr>
									<th>Tên thể loại game</th>
									<th>Chọn</th>
								</tr>
								@foreach(Type::all() as $key => $value)
									<tr>
										<td>{{ $value->name }}</td>
										<td>
											<input type="checkbox" name="type_id[]" value="{{ $value->id }}" {{ checkedGameType($value->id, $inputGame->id) }} />
										</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>
					<div class="box-body table-responsive">
						<h4>Chọn chuyên mục</h4>
						<div class="overflow-box">
							<table class="table table-bordered">
								<tr>
									<th>Tên chuyên mục</th>
									<th>Chọn</th>
								</tr>
								@foreach(CategoryParent::all() as $key => $value)
									<tr>
										<td>{{ $value->name }}</td>
										<td>
											<input type="checkbox" name="category_parent_id[]" value="{{ $value->id }}" {{ checkBoxGame($inputGame->id, $value->id) }} />
										</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>
				</div>
			</div>
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

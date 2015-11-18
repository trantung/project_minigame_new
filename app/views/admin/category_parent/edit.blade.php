@extends('admin.layout.default')

@section('title')
{{ $title='Sửa chuyên mục' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('CategoryParentController@index') }}" class="btn btn-success">Danh sách chuyên mục</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('CategoryParentController@update', $inputCategory->id), 'method' => 'PUT', 'files' => true)) }}
				<div class="row">
					<div class="col-sm-6">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Tên chuyên mục</label>
								{{ Form::text('name', $inputCategory->name , textParentCategory('Tên chuyên mục')) }}
							</div>
							<div class="form-group">
								<label for="name">Chọn vị trí</label>
										{{ Form::select('position', selectParentCategory(), $inputCategory->position, array('class' =>'form-control')) }}
							</div>
							<div class="form-group">
								<label for="name">Mức ưu tiên</label>
									{{ Form::text('weight_number', $inputCategory->weight_number , textParentCategory('Mức ưu tiên')) }}
							</div>
							<div class="form-group">
								<label for="metaname"><u>Thẻ meta</u></label>
								<div class="box-body">
									<div class="form-group">
										<label for="title_site">Thẻ title</label>
										{{ Form::text('title_site', $inputSeo->title_site, textParentCategory('Thẻ title')) }}
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
										<img class="image_fb" src="{{ UPLOADIMG . '/seo'.'/'. $inputCategory->id . '/' . $inputSeo->image_url_fb }}" />
									</div>
								</div>
							</div>
						</div>
						<!-- /.box-body -->
					</div>
					<div class="col-sm-6">
						<div class="box-body table-responsive no-padding">
							<table class="table table-bordered">
								<tr>
									<th>Tên thể loại game</th>
									<th style="width: 10px;">Mức ưu tiên</th>
									<th>Chọn</th>
								</tr>
								@foreach(Type::all() as $key => $value)
									<tr>
										<td>{{ $value->name }}</td>
										<td><input type="text" value="{{ getWeightNumberType($value->id, $inputCategory->id) }}" name="weight_number_gametype[{{ $value->id }}]" /></td>
										<td>
											<input type="checkbox" name="type_id[]" value="{{ $value->id }}" {{ checkBoxChecked($value->id, $inputCategory->id) }} />
										</td>
									</tr>
								@endforeach
							</table>
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

@stop

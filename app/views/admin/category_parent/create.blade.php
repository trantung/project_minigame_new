@extends('admin.layout.default')

@section('title')
{{ $title='Thêm chuyên mục' }}
@stop

@section('content')

@include('admin.category_parent.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('CategoryParentController@store'), 'files' => true)) }}
				<div class="row">
					<div class="col-sm-6">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Tên chuyên mục</label>
								{{ Form::text('name', null , textParentCategory('Tên chuyên mục')) }}
							</div>
							<div class="form-group">
								<label for="name">Vị trí</label>
								{{ Form::select('position', [1 => 'Menu'], null, array('class' =>'form-control')) }}
							</div>
							<div class="form-group">
								<label for="name">Mức ưu tiên</label>
									{{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
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
										<td><input type="text" value="" name="weight_number_gametype[{{ $value->id }}]" /></td>
										<td>
											<input type="checkbox" name="type_id[]" value="{{ $value->id }}" />
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

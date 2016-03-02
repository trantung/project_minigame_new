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
					<label>Loại tin</label>
					<div class="row">
						<div class="col-sm-6">
						   {{  Form::select('type', [INACTIVE => 'Tin thường', ACTIVE => 'Tin ảnh'], null, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Hình tin ảnh</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::file('image_url[]', array('id' => 'image_url', 'multiple' => true)) }}
						</div>
					</div>
					<br />
					
					<div class="row">
						<div class="col-sm-3">
							<img src="" />
						</div>
						<div class="col-sm-8">
							{{ Form::textarea('image_sapo', null , array('placeholder' => 'Mô tả ngắn hình','maxlength' => 250,'class' => 'form-control', 'rows' => '2' )) }}
						</div>
						<div class="col-sm-1"></div>
					</div>

				</div>
				<div class="form-group">
					<label for="name">Chuyên mục tin</label>
					<div class="row">
						<div class="col-sm-6">
							@if(!Admin::isSeo()) 
						   {{  Form::select('type_new_id', returnList('TypeNew'), $inputNew->type_new_id ,array('class' => 'form-control' )) }}
						   	@else
						   	{{  Form::select('type_new_id', returnList('TypeNew'), $inputNew->type_new_id ,array('class' => 'form-control', 'disabled'=>'true' )) }}
						   	@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Tin nổi bật</label>
					<div class="row">
						<div class="col-sm-6">
						   {{  Form::select('is_hot', [INACTIVE => 'Không', ACTIVE => 'Có'], $inputNew->is_hot, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Mức ưu tiên</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('weight_number',  $inputNew->weight_number, textParentCategory('Mức ưu tiên')) }}
						</div>
					</div>
				</div>
				<!-- <div class="form-group">
					<label>Vị trí</label>
					<div class="row">
						<div class="col-sm-6">
						   {{  Form::select('position', [''=>'Mặc định', '1'=>'Bên phải'], $inputNew->position,array('class' => 'form-control' )) }}
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<label>Trạng thái bài đăng</label>
					<div class="row">
						<div class="col-sm-6">
						   {{  Form::select('status', NewsManager::getNameStatusNewEdit($inputNew->user_id), $inputNew->status,array('class' => 'form-control' )) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="image_url">Ảnh đại diện</label>
					<div class="row">
						<div class="col-sm-6">
							@if(Admin::isSeo())         
							{{ Form::file('image_url', array('disabled' => 'true' )) }}
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $inputNew->id . '/' . $inputNew->image_url) }}" />
							@else
							{{ Form::file('image_url') }}
							<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $inputNew->id . '/' . $inputNew->image_url) }}" />
							@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="sapo">Mô tả ngắn</label>
					<div class="row">
						<div class="col-sm-6">
							 {{ Form::textarea('sapo', $inputNew->sapo , textParentCategory('Mô tả ngắn')) }}
						</div>
					</div>
					</div>
				<div class="form-group">
					<label for="description">Nội dung tin</label>
					<div class="row">
						<div class="col-sm-12">	 
							@if(!Admin::isSeo())                 	
						   	{{ Form::textarea('description', $inputNew->description  , array('class' => 'form-control',"rows"=>6, 'id' => 'editor1'  )) }}
						   	@else                 	
						   	{{ Form::textarea('description', $inputNew->description  , array('class' => 'form-control',"rows"=>6, 'id' => 'editor1', 'disabled' =>'true'  )) }}
						   	@endif
						</div>
					</div>
				</div>
				@if(NewsManager::checkUserRole($inputNew->user_id))
					<div class="form-group">
						<label for="start_date">Ngày xuất bản</label>
						<div class="row">
							<div class="col-sm-6">
							   <input type="text" class="form-control" name="start_date" value="{{ $inputNew->start_date }}" id="start_date">
							</div>
						</div>
					</div>
				@endif
				<div class="row">
					<div class="col-sm-6">
						<hr />
						<h1>SEO META</h1>
						{{-- include common/meta.blade.php --}}
						@include('admin.common.meta', array('inputSeo' => $inputSeo, 'pathToImageSeo' => UPLOADIMG . '/'.FOLDER_SEO_NEWS.'/'. $inputNew->id . '/'))
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

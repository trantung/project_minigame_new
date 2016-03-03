@extends('admin.layout.default')

@section('title')
{{ $title='Cập nhật tin' }}
@stop

@section('content')

@include('admin.news_report.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('NewsReportController@update', $inputNew->id), 'method' => 'PUT', 'files' => true)) }}
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
						   {{  Form::select('type', [INACTIVE => 'Tin thường', ACTIVE => 'Tin ảnh'], $inputNew->type, array('class' => 'form-control')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Hình tin ảnh</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::file('image_urls[]', array('id' => 'image_url', 'multiple' => true)) }}
						</div>
					</div>
					<br />
					@if($inputNew->type == ACTIVE)
						@foreach(NewSlide::where('new_id', $inputNew->id)->get() as $keySlide => $valueSlide)
							<div class="row">
								<div class="col-sm-3">
									<img src="{{ url(UPLOAD_NEWS_SLIDE . '/' . $inputNew->id . '/' . $valueSlide->image_url) }}"  width="100px" />
								</div>
								<div class="col-sm-7">
									{{ Form::textarea('image_sapo[]', $valueSlide->sapo , array('placeholder' => 'Mô tả ngắn hình','maxlength' => 250,'class' => 'form-control', 'rows' => '2' )) }}
								</div>
								<div class="col-sm-2">
									<a href="{{ action('NewsReportController@deleteImageSlide', [$inputNew->id, $valueSlide->id]) }}" class="btn btn-danger">Xóa</a>
								</div>
							</div>
						@endforeach
					@endif
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
						<div class="col-sm-12">
						{{ Form::textarea('sapo', $inputNew->sapo , array('placeholder' => 'Mô tả ngắn','maxlength' => 250, 'rows' => 4,'class' => 'form-control' )) }}
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
					<div class="col-sm-12">
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

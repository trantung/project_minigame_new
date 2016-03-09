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
					<label for="start_date">Ngày xuất bản</label>
					<div class="row">
						<div class="col-sm-6">
						   <input type="text" class="form-control" name="start_date" value="{{ $inputNew->start_date }}" id="start_date">
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Tác giả (hiển thị cuối bài)</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('author',  $inputNew->author, textParentCategory('Tác giả')) }}
						</div>
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
				
				@if(Admin::isAdmin() || Admin::isEditor())
				<div class="form-group">
					<label>Nhuận bút</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('author_money',  $inputNew->author_money, textParentCategory('Nhuận bút')) }}
						</div>
					</div>
				</div>
				@endif
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
					<label>Nguồn (hiển thị trước sapo)</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::text('sapo_text', $inputNew->sapo_text, textParentCategory('Nguồn')) }}
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

			{{ Form::open(array('method'=>'POST', 'action' => array('NewsReportController@approve', $inputNew->id), 'style' => 'display: inline-block;')) }}
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn duyệt?');">Duyệt tin</button>
			{{ Form::close() }}
			{{ Form::open(array('method'=>'POST', 'action' => array('NewsReportController@back', $inputNew->id), 'style' => 'display: inline-block;')) }}
				<button class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn trả lại?');">Trả lại</button>
			{{ Form::close() }}

		  </div>
		  <!-- /.box -->
	</div>
</div>
@include('admin.common.ckeditor')
@stop

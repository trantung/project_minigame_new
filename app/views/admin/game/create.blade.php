@extends('admin.layout.default')

@section('title')
{{ $title='Thêm game' }}
@stop

@section('content')

<script>
	function getFormGameOffline() {
		parentId = $('select[name=parent_id]').val();
		if (parentId == 3) {
	        $('.blockDisabled').prop('disabled', 'disabled');
	        $('.blockDisabled').hide();
	        if ($('#checkUpload').is(':checked')) {
	        	$('#checkUpload').prop('disabled', 'disabled');
	        	$('#link_upload_game').prop('disabled', false);
	        	$('#checkLinkDownload').prop('disabled', false);
	        } else {
	        	$('#checkUpload').prop('disabled', false);
	        	$('#link_upload_game').prop('disabled', 'disabled');
	        	$('#checkLinkDownload').prop('disabled', 'disabled');
	        	$('#link_download').prop('disabled', false);
	        }
	        $('#link_upload_game').val('');
	        $('#link_download').val('');
	        $('#checkUpload').show();
	    	$('#checkLinkDownload').show();
	    	$('.link_download').show();
	    }
	    else {
	    	$('.blockDisabled').prop('disabled', false);
	    	$('.blockDisabled').show();

	    	$('#checkUpload').hide();
	    	$('#checkUpload').attr('checked', 'checked');
	    	$('#checkUpload').prop('disabled', 'disabled');
	    	$('#link_upload_game').prop('disabled', false);
	    	$('#link_upload_game').val('');
	    	$('#checkLinkDownload').hide();
	    	$('#checkLinkDownload').prop('disabled', 'disabled');
	    	$('#link_download').prop('disabled', 'disabled');
	    	$('#link_download').val('');
	    	$('.link_download').hide();
	    }
	}

	$(function () {
		getFormGameOffline();
    });

	function checkUploadAction() {
		if ($('#checkUpload').is(':checked')) {
			$('#checkUpload').prop('disabled', 'disabled');
			$('#link_upload_game').prop('disabled', false);
			$('#link_download').prop('disabled', 'disabled');
			$('#link_download').val('');
			$('#checkLinkDownload').attr('checked', false);
			$('#checkLinkDownload').prop('disabled', false);
		} else {
			$('#checkUpload').prop('disabled', false);
			$('#link_upload_game').prop('disabled', 'disabled');
			$('#link_download').prop('disabled', false);
			$('#checkLinkDownload').attr('checked', 'checked');
		}
	}

	function checkLinkDownloadAction() {
		if ($('#checkLinkDownload').is(':checked')) {
			$('#checkLinkDownload').prop('disabled', 'disabled');
			$('#link_upload_game').prop('disabled', 'disabled');
			$('#link_upload_game').val('');
			$('#link_download').prop('disabled', false);
			$('#checkUpload').attr('checked', false);
			$('#checkUpload').prop('disabled', false);
		} else {
			$('#checkLinkDownload').prop('disabled', false);
			$('#link_upload_game').prop('disabled', false);
			$('#link_download').prop('disabled', 'disabled');
			$('#checkUpload').attr('checked', 'checked');
		}
	}

</script>

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
			<div class="row">
				<div class="col-sm-6">
					<div class="box-body">
						<div class="form-group">
							<label for="name">Tên game</label>
							{{ Form::text('name', null , textParentCategory('Tên game')) }}
						</div>
						<div class="form-group">
			                <label>Chọn category</label>
			                {{ Form::select('parent_id', Game::where('parent_id', NULL)->lists('name', 'id'), NULL, array('class' => 'form-control', 'onchange' => 'getFormGameOffline()')) }}
		              	</div>
						<div class="form-group">
							<label>Upload avatar</label>
							{{ Form::file('image_url') }}
						</div>
						<div class="form-group">
							<label>Mô tả</label>
					        {{ Form::textarea('description',"", array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
						</div>
						<div class="form-group">
							<label>Upload game</label>
							<input type="checkbox" id="checkUpload" onclick="checkUploadAction();" />
							{{ Form::file('link_upload_game', array('id' => 'link_upload_game')) }}
						</div>

						<div class="form-group link_download">
							<label>Link download game</label>
							<input type="checkbox" id="checkLinkDownload" onclick="checkLinkDownloadAction();" />
							<input type="text" name="link_download" id="link_download" class="form-control link_download" placeholder="Url download game" />
						</div>

						<div class="form-group blockDisabled">
							<label>Define game</label>
							<input type="text" name="link_url" class="form-control blockDisabled" placeholder="Define game" />
						</div>

						<div class="form-group">
							<label>Mức ưu tiên</label>
							{{ Form::text('weight_number', null , textParentCategory('Mức ưu tiên')) }}
						</div>

						<div class="form-group blockDisabled">
							<label>Cơ chế lưu điểm</label>
							{{ Form::select('score_status', saveScore(), '', array('class' => 'blockDisabled')) }}
						</div>

						<div class="form-group">
							<label>Gname</label>
							{{ Form::text('gname', null , textParentCategory('Gname')) }}
						</div>

						<div class="form-group">
			                <label>Ngày đăng</label>
			                <input type="text" class="form-control" maxlength="10" name="start_date" id="start_date" placeholder="Ngày đăng" />
		              	</div>

		              	<div class="form-group">
			                <label>Trạng thái</label>
			                {{ Form::select('status', selectStatusGame()) }}
		              	</div>

		              	<div class="form-group">
			                <label>Slide</label>
			                {{ Form::select('slide_id') }}
		              	</div>

						<hr />
						<h1>SEO</h1>
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
									<label>Upload ảnh</label>
									{{ Form::file('image_url_fb') }}
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
											<input type="checkbox" name="type_id[]" value="{{ $value->id }}" />
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
											<input type="checkbox" name="category_parent_id[]" value="{{ $value->id }}" />
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

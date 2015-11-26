@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới quảng cáo' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdvertiseController@indexChild') }} " class="btn btn-success">Danh sách quảng cáo</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdvertiseController@updateChild', $advertise->id, $modelId),'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Box hiển thị</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('model_id', getNameBoxEnable(), CommonModel::find($modelId)->model_id) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Link</label>
					<div class="row">
						<div class="col-sm-6">	
							{{ Form::text('image_link', $advertise->image_link , textParentCategory('Link')) }}
						</div>
					</div>
				</div>

				<div class="form-group">
					<label for="name">Image</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::file('image_url', array('id' => 'image_url')) }}
							<img src="{{ url(UPLOAD_ADVERTISE . '/content' .'/' .$modelId . '/' . $advertise->image_url) }}" ,width="100px", height="100px"  />
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Adsense</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('adsense', $advertise->adsense, textParentCategory('code adsense')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Status</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('status', [DISABLED => 'Ẩn', ENABLED => 'Hiển thị'], $relate->status) }}
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

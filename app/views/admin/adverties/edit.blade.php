@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới quảng cáo header và footer' }}
@stop

@section('content')

<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdvertiseController@index') }} " class="btn btn-success">Danh sách quảng cáo header và footer</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdvertiseController@update', $advertise->id), 'method' => 'PUT','files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Vị trí</label>
					<div class="row">
						<div class="col-sm-6">
						   {{ Form::select('position', [1 => 'Header', 2 => 'Footer'], $advertise->position) }}
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
							<img src="{{ url(UPLOAD_ADVERTISE . '/header_footer' .'/' .$advertise->id . '/' . $advertise->image_url) }}" ,width="100px", height="100px"  />
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
						   {{ Form::select('status', [DISABLED => 'Ẩn', ENABLED => 'Hiển thị'], $advertise->status) }}
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

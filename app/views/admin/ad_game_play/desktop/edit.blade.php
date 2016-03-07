@extends('admin.layout.default')

@section('title')
{{ $title='Sửa quảng cáo trang bài chi tiết' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdGamePlayDesktopController@index') }} " class="btn btn-success">Danh sách quảng cáo</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdGamePlayDesktopController@update', $ad->id), 'method' => 'PUT')) }}
			{{ Form::hidden('is_mobile', IS_NOT_MOBILE) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Adsense</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('adsense', $ad->adsense, textParentCategory('code adsense')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Trang con</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('model_id', AdCommon::getNameClassAdGameplay(), $ad->model_id) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Loại quảng cáo</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('type', AdCommon::getTypeAdvertise(), $ad->type) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Status</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('status', [DISABLED => 'Ẩn', ENABLED => 'Hiển thị'], $ad->status) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Vị trí</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('position', AdCommon::getPositionClassAd('ad_game_play_desktop'), $ad->position) }}
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

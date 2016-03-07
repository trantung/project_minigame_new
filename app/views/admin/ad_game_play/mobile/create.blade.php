@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới quảng cáo trang game play mobile' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdGamePlayMobileController@index') }} " class="btn btn-success">Danh sách quảng cáo game play mobile</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdGamePlayMobileController@store'))) }}
			{{ Form::hidden('is_mobile', IS_MOBILE) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Adsense</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('adsense', null, textParentCategory('code adsense')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Trang con</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('model_id', Game::whereNotNull('parent_id')->lists('name', 'id')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Loại quảng cáo</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('type', AdCommon::getTypeAdvertise()) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Status</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('status', [DISABLED => 'Ẩn', ENABLED => 'Hiển thị']) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Vị trí</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('position', AdCommon::getPositionClassAd('ad_game_play_mobile')) }}
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

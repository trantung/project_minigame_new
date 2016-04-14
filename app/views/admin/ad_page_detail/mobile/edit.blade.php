@extends('admin.layout.default')

@section('title')
{{ $title='Sửa quảng cáo trang bài chi tiết Mobile' }}
@stop

@section('content')
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="{{ action('AdPageDetailMobileController@index') }} " class="btn btn-success">Danh sách quảng cáo Mobile</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('AdPageDetailMobileController@update', $ad->id), 'method' => 'PUT')) }}
			{{ Form::hidden('is_mobile', IS_MOBILE) }}
			<div class="box-body">
				<div class="form-group">
					<label for="title">Tiều đề</label>
					<div class="row">
						<div class="col-sm-6">
						     {{ Form::text('title', $ad->title , textParentCategory('Tiêu đề')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Vị trí</label>
					<div class="row">
						<div class="col-sm-6">	                  	
						   {{ Form::select('position', AdCommon::getPositionClassAd('ad_pagedetail_mobile'), $ad->position) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Adsense</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('adsense', $ad->adsense, textParentCategory('code adsense')) }}
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Adsense 2</label>
					<div class="row">
						<div class="col-sm-6">
							{{ Form::textarea('adsense2', $ad->adsense2, textParentCategory('code adsense2')) }}
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
				
			  <div class="box-footer">
				{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			  </div>
			{{ Form::close() }}
		  </div>
		  <!-- /.box -->
	</div>
</div>
@stop

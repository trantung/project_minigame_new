@extends('admin.layout.default')

@section('title')
	{{ $title='Xuất file danh sách nhuận bút phóng viên' }}
@stop

@section('content')

@if(Admin::isAdmin())
<div class="row margin-bottom">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
			  <h3 class="box-title">{{ $title }}</h3>
			</div>
			<!-- /.box-header -->
			<div class="box-body table-responsive">
				<div class="margin-bottom">
					{{ Form::open(array('action' => 'AdminExcelController@exportReporterList', 'method' => 'GET')) }}
						
						<div class="input-group" style="width: 150px; display:inline-block;">
							<label>Từ ngày</label>
						  	<input type="text" name="start_date" class="form-control" id="datepickerStartdate" placeholder="Từ ngày" />
						</div>
						<div class="input-group" style="width: 150px; display:inline-block;">
							<label>Đến ngày</label>
						  	<input type="text" name="end_date" class="form-control" id="datepickerEnddate" placeholder="Đến ngày" />
						</div>
						<div class="input-group" style="display: inline-block; vertical-align: bottom;">
							<input type="submit" value="Xuất file excel" class="btn btn-primary" />
						</div>

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endif

@stop


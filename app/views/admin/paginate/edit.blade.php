@extends('admin.layout.default')

@section('title')
{{ $title='Sửa phân trang' }}
@stop

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
				<!-- form start -->
				{{ Form::open(array('action' => array('AdminPaginateController@update', $data->id), 'method' => 'PUT')) }}
				<div class="row">
					<div class="col-sm-6">
						<div class="box-body">
							<div class="form-group">
								<label for="name">Tên loại phân trang</label>
								<div>
									<span>{{ getNamePaginate($data->status) }}</span>
								</div>
							</div>
							<div class="form-group">
								<label>Số</label>
								{{ Form::text('paginate_number', $data->paginate_number , textParentCategory('Số lượng')) }}
							</div>
						</div>
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
				</div>
				{{ Form::close() }}
			</div>
	</div>
</div>

@stop

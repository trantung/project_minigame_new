@extends('admin.layout.default')

@section('title')
{{ $title='Sửa text link logo' }}
@stop
@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
		{{ Form::open(array('action' => array('AdminLogoController@update', $logo->id), 'method' => 'PUT')) }}
			<div class="box-body">
				<div class="form-group">
				  	<label for="name">Textlink logo</label>
				  	<div class="row">
						<div class="col-sm-12">
						   {{ Form::text('text_link', $logo->text_link , textParentCategory('Nhập textlink vào đây')) }}
						</div>
				 	</div>
				</div>
			  	<div class="box-footer">
					{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			  	</div>
		  	</div>
		{{ Form::close() }}
		</div>
	</div>
</div>
@stop

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
							{{ Form::textarea('text_link', $logo->text_link, array('class' => 'form-control',"rows"=>6, 'id' => 'editor1')) }}
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
@include('admin.common.ckeditor')
@stop

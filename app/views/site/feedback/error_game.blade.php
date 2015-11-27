@extends('site.layout.default')

@section('title')
{{ $title='Báo lỗi game' }}
@stop

@section('content')


<div class="box">
	<h3>Báo lỗi game</h3>
	<div class=" ad">
		<h4><b>Bạn đang thắc mắc?</b></h4>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-4">
			@include('site.common.message')
		</div>
	</div>
	<div class="clearfix"></div>
	{{ Form::open(array('action' =>  array('SiteFeedbackController@createErrorGame', $input_errorGame->id), 'method' => 'PUT', 'class' => 'form-horizontal')) }}

		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Tên game:</label>
			<div class="col-sm-4">
				{{ $input_errorGame->name }}
			</div>
		</div>

		<div class="form-group">
			<label for="username" class="col-sm-4 control-label label-text">Nội dung báo lỗi:</label>
			<div class="col-sm-6">
				<textarea class="form-control" name="description" rows="5" placeholder="Nội dung góp ý" id="description" require></textarea>
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-offset-4 col-sm-4">
				<input type="submit" class="btn btn-primary " value="gửi" /> &nbsp
				<input type="button"  class="btn btn-primary " value="nhập lại" onclick="myFunctionResertText()" />

			</div>
		@include('site.feedback.common')

		</div>
		
	{{ Form::close() }}
	<div class="clearfix"></div>
</div>

@stop
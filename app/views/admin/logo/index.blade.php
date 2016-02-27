@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý Logo' }}
@stop

@section('content')
<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách textlink cho logo</h3>
		</div>
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Text link</th>
			  <th style="width:200px;">Action</th>
			</tr>
			@foreach($logo as $value)
			<tr>
			  <td>{{ $value->id }}</td>
			  <td>{{{ $value->text_link }}}</td>
			  <td>
				<a href="{{  action('AdminLogoController@edit', $value->id) }}" class="btn btn-primary">Sửa</a>
			  </td>
			</tr>
			@endforeach
		  </table>
		</div>
	  </div>
	</div>
</div>

@stop


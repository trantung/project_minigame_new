@extends('admin.layout.default')

@section('title')
{{ $title='Sửa chuyên mục' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
	<a href="{{ action('CategoryController@index') }}" class="btn btn-success">Danh sách category</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('CategoryController@update', $game->id), 'method' => 'PUT')) }}
			<div class="box-body">
				<div class="form-group">
				  <label for="name">Tên category</label>
				  <div class="row">
					<div class="col-sm-6">	                  	
					   {{ Form::text('name', $game->name , textParentCategory('Tên category')) }}
					</div>
				  </div>
				</div>
				<div class="form-group">
					<label for="category_parent_id">Chọn parent category</label>
					  <div class="row">
						<div class="col-sm-6">
							<div class="box-body table-responsive no-padding">
								<table class="table table-bordered">
									<tr>
										<th>Tên thể loại game</th>
										<th>Chọn</th>
									</tr>
									@foreach(CategoryParent::all() as $key => $value)
										<tr>
											<td>{{ $value->name }}</td>
											<td>
												<input type="checkbox" name="category_parent_id[]" value="{{ $value->id }}" {{ checkBoxGame($game->id, $value->id) }} }} />
											</td>
										</tr>
									@endforeach
								</table>
							</div>
						</div>
					 </div>
				</div>
			</div>  
			  <!-- /.box-body -->
			<div class="box-footer">
				{{ Form::submit('Lưu lại', array('class' => 'btn btn-primary')) }}
			</div>
			{{ Form::close() }}
		</div>
		  <!-- /.box -->
	</div>
</div>
@stop

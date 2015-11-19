@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới Relation' }}
@stop

@section('content')

@include('admin.relation.common')

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('RelationController@store'))) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Box trên</label>
					<div class="row">
						<div class="col-sm-2">
							Model
						</div>
						<div class="col-sm-2">	                  	
						   {{  Form::select('type_model', selectRelationType(),null,array('class' => 'form-control' ,'onchange' => 'getState(1)', 'id' =>'category'))  }}
						</div>
						<div class="col-sm-2  ">	                  	
						    {{  Form::select('Model_id', selectRelationType(),null,array('class' => 'form-control', 'id' =>'showName' )) }}
						<script type="text/javascript">
							function getState(val) {
								var category = $('#category').val();
								console.log(category);

								$.ajax({
								type: 'POST',
								data:{category:category},
								url: 'ajax',
								// data:'model_id='+val,
								// success: function(data){
								// 	console.log(data);
								// 	$("#state-list").html(data);
								// }
									success:function(data) {
										console.log(data);
									}
								});
							}
						</script>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="name">Box dưới</label>
					<div class="row">
						<div class="col-sm-2">
							Model
						</div>
						<div class="col-sm-2">	                  	
						   {{ Form::text('name', null , textParentCategory('Tên thể loại tin')) }}
						</div>
						<div class="col-sm-2">	                  	
						   {{ Form::text('name', null , textParentCategory('Tên thể loại tin')) }}
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

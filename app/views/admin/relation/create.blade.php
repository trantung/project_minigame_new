@extends('admin.layout.default')

@section('title')
{{ $title='Thêm mới Relation' }}
@stop

@section('content')

@include('admin.relation.common')
<script type="text/javascript">


							function getState(val) {
								var category = $('#category').val();

								$.ajax({
								type: 'POST',
								data:{category:category},
								url: 'ajax',
									success:function(data) {
										
										$('#model_id').empty();
											$.each(data ,function(index, subcatObj){
												console.log(index);
												$('#model_id').append('<option value="'+ subcatObj.id+'" >'+subcatObj.id+'</option>');
											});
									}
								});
							}
</script>
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
						   {{  Form::select('type_model', selectRelationType(),null,array('class' => 'form-control' , 'id' =>'type_model'))  }}
						</div>
						<div class="col-sm-2  ">	                  	
						    <select name="model_id" id="model_id">
						    	
						    </select>
						
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

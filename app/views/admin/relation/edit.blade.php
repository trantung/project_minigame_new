@extends('admin.layout.default')

@section('title')
{{ $title='Sửa Relation' }}
@stop

@section('content')

<script type="text/javascript">
	$(function () {
	  getRelationTypeModel(); 
	  getRelationTypeCategory();
	});
	function getRelationTypeModel() {
		var category = $('#type_box_head').val();

		$.ajax({
		type: 'POST',
		data:{category:category,id:{{$inputRelation->id }}},
		url: 'ajax',
			success:function(data) {
				$('#model_id').empty();
					$.each(data ,function(index, value){
						$('#model_id').append('<option value="'+ index+'" >'+value+'</option>');
					});
			}
		});
	}
	function getRelationTypeCategory() {
		var category = $('#type_box_botton').val();
		$.ajax({
		type: 'POST',
		data:{category:category},
		url: 'ajax',
			success:function(data) {
				$('#relation_id').empty();
				
					$.each(data ,function(index, value){
						$('#relation_id').append('<option value="'+ index+'" >'+value+'</option>');
					});
			}
		});
	}
</script>
<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('RelationController@update', $inputRelation->id), 'method' => 'PUT', 'files' => true)) }}
			<div class="box-body">
				<div class="form-group">
					<label for="name">Box trên</label>
					<div class="row">
						<div class="col-sm-2">
							Model
						</div>
						<div class="col-sm-2">	                  	
						   {{  Form::select('model_name', selectRelationType(), $inputRelation->model_name ,array('class' => 'form-control' ,'onchange' => 'getRelationTypeModel()', 'id' =>'type_box_head'))  }}
						</div>
						<div class="col-sm-2  ">	                  	
						    <select name="model_id" id="model_id" class="form-control">
						    	
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
						   {{  Form::select('relation_name', selectRelationType(), $inputRelation->relation_name,array('class' => 'form-control' ,'onchange' => 'getRelationTypeCategory()', 'id' =>'type_box_botton'))  }}
						</div>
						<div class="col-sm-2">	                  	
						   <select name="relation_id" id="relation_id" class="form-control">
						    	
						    </select>
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

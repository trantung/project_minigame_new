@extends('admin.layout.default')

@section('title')
{{ $title='Thêm chuyên mục' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
	<a href="/" class="btn btn-success">Danh sách category</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
			<!-- form start -->
			{{ Form::open(array('action' => array('CategoryController@store', 'files'=> true))) }}
			  <div class="box-body">
				<div class="form-group">
				  <label for="name">Tên category</label>
				  <div class="row">
					<div class="col-sm-6">	                  	
					   {{ Form::text('name', null , textParentCategory('Tên category')) }}
					</div>
				  </div>
				</div>
				<div class="form-group">
				  <label for="category_parent_id">Chọn parent category</label>
				  <div class="row">
					<!-- <div class="col-sm-6">                      
					  {{ Form::select('category_parent_id', [0 => 'Select'] + returnList('CategoryParent'), array('class' =>'form-control')) }}
					</div> -->
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
											<input type="checkbox" name="type_id[]" value="{{ $value->id }}" />
										</td>
									</tr>
								@endforeach
							</table>
						</div>
					</div>
				  </div>
				</div>
				<div class="form-group">               
				  <label for="metaname"><u>Thẻ meta</u></label>
				  <div class="box-body">
					<div class="form-group">
						<label for="title_site">Thẻ title</label>
						<div class="row">
							<div class="col-sm-6">
							  {{ Form::text('title_site','',textParentCategory('Thẻ title')) }}
							</div>                          
						</div>	                  		
						</div>
					<div class="form-group">
					  <label for="description_site">Thẻ Descript site</label>
						<div class="row">
							<div class="col-sm-6">
							 {{ Form::textarea('description_site', null , textParentCategory('Thẻ Descript site')) }}                           
							</div>                          
						</div>                        
					</div>
					<div class="form-group">
					  <label for="keyword_site">Thẻ Keyword</label>
						<div class="row">
							<div class="col-sm-6">
							  {{ Form::text('keyword_site', null , textParentCategory('Thẻ Keyword')) }}                              
							</div>                          
						</div>                        
					</div>
					<div class="form-group">
					  <label for="title_fb">Thẻ title facebook</label>
						<div class="row">
							<div class="col-sm-6">
							  {{ Form::text('title_fb', null , textParentCategory('Thẻ facebook')) }}                            
							</div>                          
						</div>                        
					</div>
					<div class="form-group">
					  <label for="description_fb">Thẻ descript facebook</label>
						<div class="row">
							<div class="col-sm-6">
							  {{ Form::textarea('description_fb', null , textParentCategory('Thẻ descript facebook')) }}                              
							</div>                          
						</div>                        
					</div>
					<div class="form-group">
					  <label for="image_url_fb">Upload ảnh</label>
						<div class="row">
							<div class="col-sm-6">
									{{ Form::file('image_url_fb') }}                   
							</div>                          
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

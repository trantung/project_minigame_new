@extends('admin.layout.default')

@section('title')
{{ $title='Thêm chuyên mục' }}
@stop

@section('content')

<div class="row margin-bottom">
  <div class="col-xs-12">
    <a href="/" class="btn btn-success">Danh sách chuyên mục</a>
  </div>
</div>

<div class="row">
	<div class="col-xs-12">
		<div class="box box-primary">
            <!-- form start -->
            {{ Form::open(array('route' => array('postcreate'))) }}
              <div class="box-body">
                <div class="form-group">
                  <label for="name">Tên chuyên mục</label>
                  <div class="row">
                  	<div class="col-sm-6">	                  	
                       {{ Form::text('name', null , textPerentCategory('Tên chuyên mục')) }}
	                  </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Chọn vị trí</label>
                  <div class="row">
                    <div class="col-sm-6">                      
                      {{ Form::select('position', selectParentCategory(), null, array('class' =>'form-control')) }}
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="name">Mức ưu tiên</label>
                  <div class="row">
                    <div class="col-sm-6">
                      {{ Form::text('weight_number', null , textPerentCategory('Mức ưu tiên')) }}                                       
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
                              {{ Form::text('title_site','',textPerentCategory('Thẻ title')) }}
                            </div>                          
                        </div>	                  		
	              		</div>
                    <div class="form-group">
                      <label for="description_site">Thẻ Descript site</label>
                        <div class="row">
                            <div class="col-sm-6">
                             {{ Form::text('description_site', null , textPerentCategory('Thẻ Descript site')) }}                           
                            </div>                          
                        </div>                        
                    </div>
                    <div class="form-group">
                      <label for="keyword_site">Thẻ Keyword</label>
                        <div class="row">
                            <div class="col-sm-6">
                              {{ Form::text('keyword_site', null , textPerentCategory('Thẻ Keyword')) }}                              
                            </div>                          
                        </div>                        
                    </div>
                    <div class="form-group">
                      <label for="title_fb">Thẻ title facebook</label>
                        <div class="row">
                            <div class="col-sm-6">
                              {{ Form::text('title_fb', null , textPerentCategory('Thẻ facebook')) }}                            
                            </div>                          
                        </div>                        
                    </div>
                    <div class="form-group">
                      <label for="description_fb">Thẻ descript facebook</label>
                        <div class="row">
                            <div class="col-sm-6">
                              {{ Form::text('description_fb', null , textPerentCategory('Thẻ descript facebook')) }}                              
                            </div>                          
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

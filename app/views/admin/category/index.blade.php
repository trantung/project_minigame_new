@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý category' }}
@stop

@section('content')

<!-- inclue Search form 

-->
<div class="row margin-bottom">
	<div class="col-xs-12">
		<a href="#" class="btn btn-primary">Thêm category</a>
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Danh sách category</h3>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive no-padding">
		  <table class="table table-hover">
			<tr>
			  <th>ID</th>
			  <th>Tên Category</th>
			  <th>Số game</th>
			  <th>Tổng View</th>			  
			  <th>Tổng dowload</th>	
			  <th style="width:200px;">&nbsp;</th>
			</tr>
			 
			<tr>
			  <td>1</td>
			  <td>Hành động</td>
			  <td>10</td>
			  <td>10</td>			
			  <td>20</td>
			  <td>
			  	<a href="#" class="btn btn-success">Xem</a>
				<a href="#" class="btn btn-primary">Sửa</a>
				<a href="#" class="btn btn-danger">Xóa</a>
			  </td>

			</tr>
			  @endforeach
		  </table>
		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
</div>

<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $categoryParents->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>

@stop


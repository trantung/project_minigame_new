<h4>Bình luận</h4>
<div class="comment">
	<!-- Nav tabs -->
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="#comment1" aria-controls="comment1" role="tab" data-toggle="tab">choinhanh.vn</a></li>
		<li role="presentation"><a href="#comment2" aria-controls="comment2" role="tab" data-toggle="tab">Facebook</a></li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		
		<div role="tabpanel" class="tab-pane active" id="comment1">
		{{ Form::open(array('action' => array('SiteCommentController@store'))) }}
		<!-- comment cho game -->
			<div class="box-body">
				<div class="form-group">
					<label for="name">Comment choi nhanh</label>
					<div class="row">
						<div class="col-sm-12">
						    {{ Form::textarea('description', '' , array('class' => 'form-control')) }}
						</div>
					 </div>
				</div>
			</div>
			<div class="box-footer">
				{{ Form::submit('Comment', array('class' => 'btn btn-primary')) }}
			</div>
		<!-- hiển thị comment cho game -->
		<div class="box-body ">
			<table class="table table-hover">

			 @foreach($inputComment as $value)
			<tr>
			  <td>Ảnh</td>
			  <td><b>{{ User::find($value->user_id)->user_name.User::find($value->user_id)->uname.User::find($value->user_id)->google_name }}</b></td>
			  <td>{{ $value->description }}</td>			
			</tr>
			@endforeach
			</table>
		</div>
		{{ Form::close() }}
		</div>
			
		
		<div role="tabpanel" class="tab-pane" id="comment2">
			<div class="fb-comments" data-href="{{ Request::url() }}" data-numposts="5"></div>
		</div>
	</div>
</div>
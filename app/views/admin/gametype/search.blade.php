<div class="margin-bottom">
	{{ Form::open(array('action' => 'GameTypeController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại/label>
		  	<input type="text" name="name" class="form-control" placeholder="Tiêu đề" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại</label>
			 {{  Form::select('type_new_id', ['0' => '-- Lựa chọn'] + returnList('TypeNew')  ,null,array('class' => 'form-control' )) }}
		</div>
		
	</form>
</div>
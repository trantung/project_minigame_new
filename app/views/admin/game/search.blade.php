<div class="margin-bottom">
	{{ Form::open(array('action' => 'AdminGameController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Từ khóa</label>
		  	<input type="text" name="keyword" class="form-control" placeholder="Search" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Category</label>
		  	{{ Form::select('parent_id', ['' => '-- chọn'] + Game::where('parent_id', NULL)->lists('name', 'id'), null, array('class' =>'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Chuyên mục</label>
		  	{{ Form::select('category_parent_id', ['' => '-- chọn'] + CategoryParent::lists('name', 'id'), null, array('class' =>'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại game</label>
		  	{{ Form::select('type_id', ['' => '-- chọn'] + Type::lists('name', 'id'), null, array('class' =>'form-control')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày bắt đầu</label>
		  	<input type="text" name="start_date" class="form-control" maxlength="10" placeholder="Ngày bắt đầu" id="start_date" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Ngày kết thúc</label>
		  	<input type="text" name="end_date" class="form-control" maxlength="10" placeholder="Ngày kết thúc" id="end_date" />
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Sắp xếp</label>
		  	{{ Form::select('sortBy', selectGameSortBy(), null, array('class' =>'form-control')) }}
		</div>
		<div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
			<input type="submit" value="Search" class="btn btn-primary" />
		</div>
	{{ Form::close() }}
</div>
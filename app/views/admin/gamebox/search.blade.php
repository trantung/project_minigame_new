<div class="margin-bottom">
	{{ Form::open(array('action' => 'AdminGameBoxController@search', 'method' => 'GET')) }}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Từ khóa</label>
		  	{{ Form::text('keyword', Input::get('keyword'), array('class' => 'form-control', 'placeholder' => 'Search')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Category</label>
		  	{{ Form::select('parent_id', ['' => '-- chọn'] + Game::where('parent_id', NULL)->lists('name', 'id'), Input::get('parent_id'), array('class' =>'form-control')) }}
		</div>
		{{-- <div class="input-group" style="width: 150px; display:inline-block;">
			<label>Chuyên mục</label>
		  	{{ Form::select('category_parent_id', ['' => '-- chọn'] + CategoryParent::lists('name', 'id'), null, array('class' =>'form-control')) }}
		</div> --}}
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Thể loại game</label>
		  	{{ Form::select('type_id', ['' => '-- chọn'] + Type::lists('name', 'id'), Input::get('type_id'), array('class' =>'form-control')) }}
		</div>

		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Sắp xếp theo lượt chơi</label>
		  	{{ Form::select('sortByCountPlay', selectSortBy('count_play'), Input::get('sortByCountPlay'), array('class' =>'form-control')) }}
		</div>

		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Index</label>
		  	{{ Form::select('index', ['' => 'Tất cả', 1 => 'Có index'], Input::get('index'), array('class' =>'form-control')) }}
		</div>

		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Trạng thái</label>
		  	{{ Form::select('status', ['' => '-- chọn'] + selectStatusGame(), Input::get('status'), array('class' =>'form-control')) }}
		</div>

		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Từ ngày</label>
			{{ Form::text('start_date', Input::get('start_date'), array('class' => 'form-control', 'id' => 'datepickerStartdate', 'placeholder' => 'Từ ngày')) }}
		</div>
		<div class="input-group" style="width: 150px; display:inline-block;">
			<label>Đến ngày</label>
		  	{{ Form::text('end_date', Input::get('end_date'), array('class' => 'form-control', 'id' => 'datepickerEnddate', 'placeholder' => 'Đến ngày')) }}
		</div>
		<div class="input-group" style="display: block; vertical-align: bottom; margin-top: 15px;">
			{{ Form::submit('Search', array('class' => 'btn btn-primary')) }}
		</div>
	{{ Form::close() }}
</div>
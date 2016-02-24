<div class="top-bar">
	<div class="row">
		<div class="col-sm-8">
			@if(isset($breadcrumb)) 
				<div class="breadcrumb">
					<ul>
						<li><a href="{{ url('/') }}">Trang chủ</a><i class="fa fa-caret-right"></i></li>
						@foreach($breadcrumb as $value)
							@if($value['link'])
								<li>
									<a href="{{ url($value['link']) }}">{{ $value['name'] }}</a><i class="fa fa-caret-right"></i>
								</li>
							@else
								<li>
									{{ $value['name'] }}
								</li>
							@endif
						@endforeach
					</ul>
				</div>
			@endif
		</div>
		<div class="col-sm-4">
			@if(getDevice() == COMPUTER)
				<div class="search">
					<form action="{{ action('SearchGameController@index') }}">
						<input type="text" name="search" value="" title="search" placeholder="" />
						<input type="submit" value="search" title="submit" />
					</form>
				</div>
			@endif
		</div>
	</div>
</div>
<div class="top-bar">
	<div class="row">
		<div class="col-sm-8">
			@if(isset($breadcrumb)) 
				<div class="breadcrumb">
					<ul>
						<li><a href="{{ url('/') }}">Trang chủ</a><i class="fa fa-caret-right"></i></li>
						@foreach($breadcrumb as $key => $value)
							@if($value['link'])
								@if(isset($isH1) && ($key == count($breadcrumb) - 1))
									<li><h1><a href="{{ url($value['link']) }}">{{ $value['name'] }}</a></h1></li>
								@else
									<li>
										<a href="{{ url($value['link']) }}">{{ $value['name'] }}</a><i class="fa fa-caret-right"></i>
									</li>
								@endif
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
@include('site.common.ads', array('adPosition' => POSITION_HEADER))
@include('site.common.ads', array('adPosition' => POSITION_MOBILE_HEADER))

@if($breadcrumb)
<div class="breadcrumb">
	<ul>
		<li><a href="{{ url('/') }}">Trang chủ</a>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;</li>
		@foreach($breadcrumb as $value)
			@if($value['link'])
				<li>
					<a href="{{ url($value['link']) }}">{{ $value['name'] }}</a>&nbsp;<i class="fa fa-caret-right"></i>&nbsp;
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
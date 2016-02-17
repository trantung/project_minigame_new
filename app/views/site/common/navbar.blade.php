<div class="menu-top">
<div class="container">
		<div class="row">
			<div class="menu-static">
				<ul>
					<li><a href="{{ url('/') }}" {{ checkActive() }}><i class="fa fa-home"></i><span>Home</span></a></li>
					@foreach($menu_top as $value)
						<li>
							<a href="{{ action('SiteNewsController@show', $value->slug) }}" {{ checkActive($value->slug) }}>
								<span>{{ $value->name }}</span>
							</a>
						</li>
					@endforeach
				</ul>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
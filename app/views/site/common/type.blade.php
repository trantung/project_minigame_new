@if(Request::segment(1) == MINI_GAME_SLUG)
	<ul class="nav-type">
	@foreach(Type::all() as $value)
		<li><a href="{{ url('/' . $value->slug) }}">{{ ($value->name) }}</a></li>
	@endforeach
	</ul>
@endif
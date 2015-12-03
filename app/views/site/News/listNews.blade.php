@extends('site.layout.default')

@section('title')
{{ $title='Danh sách tin tức' }}
@stop

@section('content')

@foreach($inputListNews as $value)
<div class="box">
	<hr/>
	<div class="table_container">
		<div class="table-row">
			<div class="col">
				<a href="{{ action('SiteNewsController@show', $value->slug) }}">
				<img class="image_fb" src="{{ url(UPLOADIMG . '/news'.'/'. $value->id . '/' . $value->image_url) }}" />
				</a>
			</div>
			<div class="col">
				<a href="{{ action('SiteNewsController@show', $value->slug) }}">
					<strong>{{ $value->title }}</strong>
				</a>
				</br>
				<!-- todo -->
				{{-- {{ $value->count_view }} người xem --}}
				{{-- </br> --}}
				{{ limit_text($value->description, SIZETEXT) }}
			</div>
		</div>
	</div>
</div>
@endforeach
<div class="row">
	<div class="col-xs-12">
		<ul class="pagination">
		{{ $inputListNews->appends(Request::except('page'))->links() }}
		</ul>
	</div>
</div>
@stop
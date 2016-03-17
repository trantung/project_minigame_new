@extends('site.layout.default', array('model_name' => 1, 'model_id' => 1))

@section('title')
	{{ $title = 'Kênh tin RSS' }}
@stop

@section('content')

<?php
	$breadcrumb = array(
		['name' => $title, 'link' => '']
	);
?>
@include('site.common.bar', ['breadcrumb' => $breadcrumb, 'isH1' => 1, 'model_name' => 1, 'model_id' => 1])

<div class="row">
	<div class="col-sm-8">
		<div class="box-main">
			<h1>Kênh tin RSS</h1>
			<p><strong>RSS là gì?</strong></p>
			<p>RSS (Really Simple Syndication) Dịch vụ cung cấp thông tin cực kì đơn giản. Dành cho việc phân tán và khai thác nội dung thông tin Web từ xa(ví dụ như các tiêu đề, tin tức). Sử dụng RSS, các nhà cung cấp nội dung Web có thể dễ dàng tạo và phổ biến các nguồn dữ liệu ví dụ như các link tin tức, tiêu đề, và tóm tắt.</p>
			<p><strong>Danh mục các kênh RSS hiện có:</strong></p>
			<div class="rss-list">
				<ul>
					<li><a href="{{ url('rss/home') }}"><img src="{{ url('assets/images/rss.gif') }}" /> Trang chủ</a></li>
				</ul>
				<ul>
					@if(isset($type))
						@foreach($type as $value)
							<li><a href="{{ url('rss/'.$value->slug) }}"><img src="{{ url('assets/images/rss.gif') }}" /> {{ $value->name }}</a></li>
						@endforeach
					@endif
				</ul>
				<ul>
					@if(isset($typeNew))
						@foreach($typeNew as $value)
							<li><a href="{{ url('rss/'.$value->slug) }}"><img src="{{ url('assets/images/rss.gif') }}" /> {{ $value->name }}</a></li>
						@endforeach
					@endif
				</ul>
			</div>
			<p><strong>Các giới hạn sử dụng:</strong></p>
			<p>Các nguồn kênh tin được cung cấp miễn phí cho các cá nhân và các tổ chức phi lợi nhuận. Chúng tôi yêu cầu bạn cung cấp rõ các thông tin cần thiết khi bạn sử dụng các nguồn kênh tin này từ báo điện tử Kiến Thức</p>
			<p>Chúng tôi hoàn toàn có quyền yêu cầu bạn ngừng cung cấp và phân tán thông tin dưới dạng này ở bất kỳ thời điểm nào và với bất kỳ lý do nào.</p>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="side">
			@if(getDevice() == COMPUTER)
				@include('site.common.ads', array('adPosition' => POSITION_RIGHT, 'model_name' => 1, 'model_id' => 1))
			@endif
		</div>
	</div>
</div>

@include('site.common.gamebox', array('model_name' => 1, 'model_id' => 1))

@include('site.common.gameboxmini', array('model_name' => 1, 'model_id' => 1))

@stop


@if(isset($model_name))
	@if(getDevice() == MOBILE)
		@include('site.common.ads', array('adPosition' => POSITION_MOBILE_FOOTER, 'model_name' => $model_name, 'model_id' => $model_id))
	@endif
@endif
<div class="footer">
	<ul>
	  <li><a href="{{ url('/') }}" {{ checkActive() }}>Home</a></li>
	  <li><a href="{{ action('SiteFeedbackController@create') }}" {{ checkActive('gop-y') }}>Góp ý</a></li>
	  <li><a href="{{ action('SiteFeedbackController@policy') }}" {{ checkActive('chinh-sach') }}>Chính sách</a></li>
	</ul>
	<div class="copyright">
	  	Chuyên trang của Báo điện tử Kiến Thức
		Giấy phép: Số 05/ GP-CBC Cục Báo chí - Bộ TTTT. Cấp ngày: 21 tháng 04 năm 2015.
		<br/>
		Tổng biên tập: Nguyễn Minh Quang.
		Tòa soạn: Số 465B Hoàng Hoa Thám, Quận Ba Đình, Hà Nội.
		<br/> 
		Hotline: 096 532 77 56.
		Điện thoại: 04.6269.3999 máy lẻ 189. Fax: 04.32474786 Email: tkts@kienthuc.net.vn
		<br/>
		Liên hệ quảng cáo: Ms Hằng - Điện thoại: 0948 849 848.
	</div>
	<div class="textlink">
	@if($script)
		{{ $script->footer_script }}
	@endif
	</div>
</div>
<p class="social">
	<div class="fb-like" data-share="true" data-show-faces="false" data-href="{{ Request::url() }}"></div>
	<a href="#"><img src="/assets/images/shareGoogle.png" width="80px" height="22px"></a>
	<a href="{{ action('SiteFeedbackController@errorGame', array('id' => $id)) }}" class="report-error"><i class="fa fa-warning"></i> Báo lỗi</a>
</p>
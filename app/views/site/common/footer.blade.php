<div class="footer">
	<ul>
	  <li><a href="{{ url('/') }}" {{ checkActive() }}>Home</a></li>
	  <li><a href="{{ action('SiteFeedbackController@create') }}" {{ checkActive('gop-y') }}>Góp ý</a></li>
	  <li><a href="{{ action('SiteFeedbackController@policy') }}" {{ checkActive('chinh-sach') }}>Chính sách</a></li>
	</ul>
	<div class="copyright">
	  Bản quyền thuộc &copy; ABC ,JSC
	</div>
</div>
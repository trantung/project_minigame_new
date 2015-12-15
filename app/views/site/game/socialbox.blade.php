<div class="social">
	<div class="fb-like" data-width="100" data-layout="button_count" data-share="true" data-show-faces="false" data-href="{{ Request::url() }}"></div>

	<script src="https://apis.google.com/js/platform.js" async defer></script>
	<div class="g-plus" data-action="share" data-annotation="bubble" data-height="20"></div>

	<a class="fullscreen" href="#">Fullscreen</a>

	<?php
	    if(Session::has('voterate'.$id)) {
	        //
	    } else {
	 ?>
	<span class="social-vote-label">Đánh giá của bạn</span>
	<div class="social-vote">
		@include('site.game.vote', array('id' => $id))
	</div>
	<?php } ?>

</div>
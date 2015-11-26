<!-- MOBILE <= 500px -->
<div class="row mobile">

	<div class="col-xs-3">
		<img alt="" src="/assets/images/detai_game3.png" />
	</div>
	<div class="col-xs-9">

		<h1 class="title mobile-title">{{ $game->name }}</h1><img class="startitle" src="/assets/images/star.png" height="20" width="122" />

		<p>{{ $game->count_play }} người chơi</p>

	</div>

	<div class="col-xs-12">
		<div class="imgGamedowload">
			<img alt="" src="/assets/images/taive.png" />
		</div>
		<p>
			{{ $game->description }}
		</p>
		<p>
			<a href="{{ url(UPLOAD_GAMEOFFLINE.$game->link_upload_file) }}" class="download"><i class="fa fa-download"></i> Download</a>
		</p>
		<div class="stars">
			<strong>Đánh giá: </strong>
			<form action="">
				<input class="star star-5" id="star-5" type="radio" name="star"/>
				<label class="star star-5" for="star-5"></label>
				<input class="star star-4" id="star-4" type="radio" name="star"/>
				<label class="star star-4" for="star-4"></label>
				<input class="star star-3" id="star-3" type="radio" name="star"/>
				<label class="star star-3" for="star-3"></label>
				<input class="star star-2" id="star-2" type="radio" name="star"/>
				<label class="star star-2" for="star-2"></label>
				<input class="star star-1" id="star-1" type="radio" name="star"/>
				<label class="star star-1" for="star-1"></label>
				<div class="clearfix"></div>
			</form>
		</div>

		<p class="social">
			<a href="#"><img src="/assets/images/likeFacebook.png" width="80px" height="22px" ></a>
			<a href="#"><img src="/assets/images/shareFacebook.png" width="80px" height="22px"></a>
			<a href="#"><img src="/assets/images/shareGoogle.png" width="80px" height="22px"></a>
			<a href="#" class="report-error"><i class="fa fa-warning"></i> Báo lỗi</a>
		</p>
	</div>

</div>
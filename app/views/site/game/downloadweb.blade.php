<!-- WEB -->
<div class="row web">

	<div class="col-sm-6 imgGamedowload">
		<img alt="" src="/assets/images/taive.png" />
	</div>
	<div class="col-sm-6 ">
		<h1 class="title">{{ $game->name }}</h1><img class="startitle" src="/assets/images/star.png" height="20" width="122" />
		<p>{{ getZero($game->count_play) }} người chơi</p>
		<p>{{ $game->description }}</p>
		<div class="stars">
			<strong>Đánh giá: </strong>
			<form action="">
				<input class="star star-5" id="star-5-1" type="radio" name="star"/>
				<label class="star star-5" for="star-5-1"></label>
				<input class="star star-4" id="star-4-1" type="radio" name="star"/>
				<label class="star star-4" for="star-4-1"></label>
				<input class="star star-3" id="star-3-1" type="radio" name="star"/>
				<label class="star star-3" for="star-3-1"></label>
				<input class="star star-2" id="star-2-1" type="radio" name="star"/>
				<label class="star star-2" for="star-2-1"></label>
				<input class="star star-1" id="star-1-1" type="radio" name="star"/>
				<label class="star star-1" for="star-1-1"></label>
				<div class="clearfix"></div>
			</form>
		</div>
		<p>
		<a href="{{ CommonGame::getUrlDownload($game) }}" class="download"><i class="fa fa-download"></i> Download</a>
		</p>
		<p>
		<a href="#"><img src="/assets/images/likeFacebook.png"></a>
		&nbsp
		<a href="#"><img src="/assets/images/shareFacebook.png"></a>
		&nbsp
		<a href="#"><img src="/assets/images/shareGoogle.png"></a>
		<a href="#" class="report-error"><i class="fa fa-warning"></i> Báo lỗi</a>
		</p>
		<div class="img_game_detail">
			<a href="#"><img src="/assets/images/detai_game1.png"></a>
			 &nbsp&nbsp&nbsp
			 <a href="#"><img src="/assets/images/detai_game2.png"></a>
			 &nbsp&nbsp&nbsp
			 <a href="#"><img src="/assets/images/detai_game3.png"></a>
			 &nbsp&nbsp&nbsp
			 <a href="#"><img src="/assets/images/detai_game1.png"></a>
			 &nbsp&nbsp&nbsp
			 <a href="#"><img src="/assets/images/detai_game2.png"></a>
			 &nbsp
		</div>
	</div>

</div>
{{ HTML::style('assets/css/bootstrap.min.css') }}
{{ HTML::script('assets/js/jquery-2.1.4.min.js') }}
{{ HTML::script('assets/js/bootstrap.min.js') }}
<style>
	.container {
	    padding-left: 5px;
	    padding-right: 5px;
	}
	.row {
	    margin-left: -5px;
	    margin-right: -5px;
	}
	.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
	    padding-left: 5px;
	    padding-right: 5px;
	}
	.kt-boxgame {
	    background: #2B74A1;
	    width: 670px;
	    margin: 0 auto;
	    height: 430px;
	}
	.nav-tabs {
	    border-bottom: 1px solid #ddd;
	    background: #E7E7E7;
	}
	.nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
	    color: #fff;
	    cursor: default;
	    background-color: #2B74A1;
	    border: none;
	}
	.nav-tabs>li>a {
	    margin-right: 2px;
	    line-height: 1.42857143;
	    background: #E7E7E7;
	    border: 0;
	    margin-right: 0;
	    border-right: 1px solid #ccc;
	    padding: 8px 15px;
	    border-radius: 0;
	}
	.kt-boxgame-left {
		padding: 15px;
	}
	.kt-boxgame-left > img {
		width: 100%;
		max-width: 100%;
		height: auto;
		display: block;
		border-radius: 5px;
		border: 3px solid #fff;
	}
	.kt-boxgame-left > strong {
		display: block;
		font-weight: bold;
		font-size: 18px;
		color: #fff;
		margin-top: 5px;
		margin-bottom: 5px;
	}
	.kt-boxgame-left > p {
		text-align: justify;
		color: #fff;
	}
	.kt-boxgame-right {
		padding: 15px;
	}
	.kt-boxgame-right-images > img {
		width: 100%;
		max-width: 100%;
		height: auto;
		display: block;
		border-radius: 5px;
		border: 3px solid #fff;
	}
	.kt-boxgame-right-text {
		
	}
	.kt-boxgame-right-text > strong {
		display: block;
	    font-weight: bold;
	    font-size: 14px;
	    color: #fff;
	    margin-top: 3px;
	    margin-bottom: 3px;
	}
	.kt-boxgame-right-text > p {
	    color: #fff;
	    font-size: 12px;
	    line-height: 16px;
	}
	
</style>
<div class="kt-boxgame">
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active">
			<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Game Hot</a>
		</li>
		<li role="presentation">
			<a href="#tab2" aria-controls="tab2" role="tab" data-toggle="tab">Bạn gái</a>
		</li>
		<li role="presentation">
			<a href="#tab3" aria-controls="tab3" role="tab" data-toggle="tab">Thời trang</a>
		</li>
		<li role="presentation">
			<a href="#tab4" aria-controls="tab4" role="tab" data-toggle="tab">Thể thao</a>
		</li>
	</ul>
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="home">
			<div class="row">
				<div class="col-xs-6">
					<div class="kt-boxgame-left">
						<img src="/assets/images/game12.jpg" />
						<strong>Ngưu ma vương</strong>
						<p>Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương </p>
					</div>
				</div>
				<div class="col-xs-6">
					<div class="kt-boxgame-right">
						<div class="row">
							<div class="col-xs-4 kt-boxgame-right-images">
								<img src="/assets/images/game12.jpg" />
							</div>
							<div class="col-xs-8 kt-boxgame-right-text">
								<strong>Ngưu ma vương</strong>
								<p>Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 kt-boxgame-right-images">
								<img src="/assets/images/game12.jpg" />
							</div>
							<div class="col-xs-8 kt-boxgame-right-text">
								<strong>Ngưu ma vương</strong>
								<p>Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 kt-boxgame-right-images">
								<img src="/assets/images/game12.jpg" />
							</div>
							<div class="col-xs-8 kt-boxgame-right-text">
								<strong>Ngưu ma vương</strong>
								<p>Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-4 kt-boxgame-right-images">
								<img src="/assets/images/game12.jpg" />
							</div>
							<div class="col-xs-8 kt-boxgame-right-text">
								<strong>Ngưu ma vương</strong>
								<p>Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương Ngưu ma vương</p>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<div role="tabpanel" class="tab-pane" id="tab2">

		</div>
		<div role="tabpanel" class="tab-pane" id="tab3">

		</div>
		<div role="tabpanel" class="tab-pane" id="tab4">

		</div>
	</div>
</div>
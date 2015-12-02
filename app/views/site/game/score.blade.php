@if(CommonSite::isLogin())
	@if($scores = CommonGame::getGameScore($id))
		<div class="charts">
			<h3>Bảng điểm</h3>
			<ul>
				@foreach($scores as $key => $value)
					<li>
						<div class="charts-image">
							<img alt="" src="{{ url('/assets/images/xep-hang-'.$key+1.'.jpg') }}" height="55" width="30" />
						</div>
						<div class="charts-text">
							<strong>
								{{ User::find($value->user_id)->user_name.User::find($value->user_id)->uname.User::find($value->user_id)->google_name }}
							</strong>
							<span>{{ $value->score }} điểm</span>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	@endif
@else

@endif
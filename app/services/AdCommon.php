<?php
/**
* 
*/
class AdCommon 
{
	public static function getNameClassAd()
	{
		
		return TypeNew::lists('name', 'id');
	}

	public static function getNameClassAdPage_Detail()
	{
		
		return AdminNew::lists('title', 'id');
	}

	public static function getNameClassAdGameplay()
	{
		
		return Game::whereNotNull('parent_id')->lists('name', 'id');
	}

	public static function getPositionClassAd($page = '')
	{
		switch ($page) {
			case 'home':
				return [
					POSITION_HEADER => 'Header' , 
					POSITION_RIGHT => 'Cột phải', 
					POSITION_NEWS_GAMES => 'Dưới cột tin', 
					POSITION_GAMES_GAMES => 'Giữa game', 
					POSITION_GAMES_MINIGAME => 'Trên gamemini', 
					POSITION_STICKY_LEFT => 'Banner trôi trái', 
					POSITION_STICKY_RIGHT => 'Banner trôi phải',
				];
				break;
			case 'home_mobile':
				return [
					POSITION_MOBILE_HEADER => 'Header mobile' , 
					POSITION_MOBILE_NEWS_GAMES => 'Dưới cột tin', 
					POSITION_MOBILE_GAMES_GAMES => 'Giữa game', 
					POSITION_MOBILE_GAMES_MINIGAME => 'Trên gamemini', 
					// POSITION_MOBILE_GAMES_TYPE => 'Dưới nấu ăn, trên chiến thuật', 
					POSITION_MOBILE_FOOTER => 'Trên Home/Góp Ý/ Chính sách', 
				];
				break;

			case 'catelog_mobile':
				return [
					POSITION_MOBILE_HEADER => 'Header mobile' , 
					POSITION_MOBILE_FOOTER => 'Trên Home/Góp Ý/ Chính sách', 
				];
				break;

			case 'ad_pagedetail_desktop':
				return [
					POSITION_SAPO => 'Dưới sapo bài viết',
					POSITION_NEWS_DETAIL_LEFT => 'Cột trái bài chi tiết',
					POSITION_RIGHT => 'Cột phải',
					POSITION_NEWS_GAMES => 'Dưới cột tin', 
					POSITION_GAMES_GAMES => 'Giữa game', 
					POSITION_STICKY_LEFT => 'Banner trôi trái', 
					POSITION_STICKY_RIGHT => 'Banner trôi phải',
				];
				break;

			case 'ad_pagedetail_mobile':
				return [
					POSITION_MOBILE_HEADER =>'Dưới menu',
					POSITION_MOBILE_SAPO =>'Dưới sapo bài viết',
					POSITION_MOBILE_NEWS_RELATED =>'Trên tin liên quan',
					POSITION_MOBILE_NEWS_DETAIL_LEFT =>'Dưới 5 Tin đáng đọc',
					POSITION_MOBILE_FOOTER =>'Trên Home/Góp Ý/ Chính sách',
					];
					break;
			case 'type_mobile':
				return [
					POSITION_MOBILE_GAMES_TYPE => 'Giữa các thể loại' , 
				];
				break;

			case 'ad_game_play_desktop':
				return[
					POSITION_PLAYGAME_SHARE => 'Dưới khung game để play',
					POSITION_INFO => 'Dưới toàn bộ khung đỏ Game',
					POSITION_INFO_RIGHT => 'Cột phải bài chi tiết, dưới Khung game hay nhất',
					POSITION_GAME_RELATED => 'Trên game khác',
					POSITION_STICKY_LEFT => 'Banner trôi trái', 
					POSITION_STICKY_RIGHT => 'Banner trôi phải',
				];
				break;

			case 'ad_game_play_mobile':
				return[
					POSITION_MOBILE_HEADER => 'Dưới menu',
					POSITION_MOBILE_INFO_TEXT => 'Dưới 2 khung game',
					POSITION_MOBILE_INFO_COMMENT => 'Trên Bình luận code',
					POSITION_MOBILE_GAME_RELATED => 'Trên Game khác',
					POSITION_MOBILE_FOOTER => 'Trên Home/Góp Ý/ Chính sách',
				];
				break;

			default:
				return [
					POSITION_HEADER => 'Header' , 
					POSITION_RIGHT => 'Cột phải', 
					POSITION_NEWS_GAMES => 'Dưới cột tin', 
					POSITION_GAMES_GAMES => 'Giữa game', 
					POSITION_STICKY_LEFT => 'Banner trôi trái', 
					POSITION_STICKY_RIGHT => 'Banner trôi phải',
				];
				break;
		}
	}
	public static function getNamePositionClassAd($value, $page = '')
	{
		$array = self::getPositionClassAd($page);
		return $array[$value];
	}

	public static function getTypeNameGame()
	{
		$ad = Type::orderBy('id', 'desc')->first();
		if ($ad) {
			$typeGame = Type::where('id', '!=', $ad->id)->lists('name', 'id');
			return $typeGame;
		}
		return NULL;
	}

	public static function getTypeAdvertise()
	{
		$array = [
			ANTS => 'Quảng cáo ANTS',
			GOOGLE_ADSENSE => 'Quảng cáo Google Adsense'
		];
		return $array;
	}

	public static function getAd($position, $modelName, $modelId, $limit = null)
	{
		if($limit) {
			$ad = Advertise::where(array('position' => $position, 'status' => ENABLED, 'model_name' => $modelName, 'model_id' => $modelId))->get();
		} else {
			$ad = Advertise::where(array('position' => $position, 'status' => ENABLED, 'model_name' => $modelName, 'model_id' => $modelId))->first();
		}
		if($ad) {
			return $ad;	
		} else {
			return NULL;
		}
		
	}

}
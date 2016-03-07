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

	public static function getPositionClassAd($page = '')
	{
		switch ($page) {
			case 'home':
				return [
					POSITION_HEADER => 'Header' , 
					POSITION_RIGHT => 'Cột phải', 
					POSITION_NEWS_GAMES => 'Dưới cột tin', 
					POSITION_GAMES_GAMES => 'Giữa game', 
					POSITION_GAMES_GAMES => 'Trên gamemini', 
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
					POSITION_MOBILE_FOOTER => 'Footer mobile', 
				];
				break;

			case 'catelog_mobile':
				return [
					POSITION_MOBILE_HEADER => 'Header mobile' , 
					POSITION_MOBILE_FOOTER => 'Footer mobile', 
				];
				break;

			case 'type_mobile':
				return [
					POSITION_MOBILE_GAMES_TYPE => 'Giữa các thể loại' , 
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
}
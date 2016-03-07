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
					POSITION_NEWS_GAMES => 'Footer tin trên game', 
					POSITION_GAMES_GAMES => 'Giữa game', 
					POSITION_GAMES_GAMES => 'Trên gamemini', 
					POSITION_STICKY_LEFT => 'Banner trôi trái', 
					POSITION_STICKY_RIGHT => 'Banner trôi phải',
				];
				break;
			
			default:
				return [
					POSITION_HEADER => 'Header' , 
					POSITION_RIGHT => 'Cột phải', 
					POSITION_NEWS_GAMES => 'Footer tin trên game', 
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
}
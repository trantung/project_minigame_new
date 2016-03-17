<?php
class SiteMap
{
	public static function getTypeUrlSiteMap()
	{
		return Type::all();
	}
	public static function getGameUrlSiteMap()
	{
    	$now = Carbon\Carbon::now();
		$games = Game::where('status', ENABLED)
				->where('start_date', '<=', $now)
				->orderBy('start_date', 'desc')
				->get();
		return $games;
	}
	public static function getNewUrlSiteMap()
	{
		$now = Carbon\Carbon::now();
		$news = AdminNew::where('start_date', '<=', $now)
				->orderBy('start_date', 'desc')
				->get();
		return $news;

		// $news = AdminNew::join('type_news', 'news.type_new_id', '=', 'type_news.id')
		// 	->select('news.*', 'type_news.slug as slugType', 'type_news.name as nameType')
		// 	->where('news.start_date', '<=', Carbon\Carbon::now())
		// 	->where('type_news.status', ENABLED)
		// 	->where('news.status', APPROVE)
		// 	->orderBy('news.start_date', 'desc')
		// 	->orderBy('news.id', 'desc')
		// 	->get();
		// return $news;
	}
}

<?php

class SiteRssController extends SiteController {

	public function index()
	{
		$type = Type::all();
		$typeNew = TypeNew::all();
		return View::make('site.rss.index')->with(compact('type', 'typeNew'));
    }

    public function rss($slug)
    {
    	if($slug == 'home') {
    		$news = AdminNew::where('status', APPROVE)
							->where('start_date', '<=', Carbon\Carbon::now())
							->where('index', ACTIVE)
							->orderBy('start_date', 'desc')
							->orderBy('id', 'desc')
							->get();
    		$content = View::make('site.rss.rss_home')->with(compact('news'));	
    	} else {
    		$type = Type::findBySlug($slug);
			$newType = TypeNew::findBySlug($slug);
			if($type) {
				// get list games in this type
				$now = Carbon\Carbon::now();
				$gamesId = Type::find($type->id)->gametypes->lists('game_id');
				$games = Game::whereIn('id', $gamesId)
						->where('status', ENABLED)
						->where('start_date', '<=', $now)
						->where('parent_id', '=', GAMEHTML5)
						->get();
				$content = View::make('site.rss.rss_games')->with(compact('games', 'type'));
			}
			if($newType) {
				$news = AdminNew::where('type_new_id', $newType->id)
							->where('status', APPROVE)
							->where('start_date', '<=', Carbon\Carbon::now())
							->orderBy('start_date', 'desc')
							->orderBy('id', 'desc')
							->get();
				$content = View::make('site.rss.rss_news')->with(compact('news', 'newType'));
			}
    	}
        return Response::make($content)->header('Content-Type', 'text/xml;charset=utf-8');
    }

}

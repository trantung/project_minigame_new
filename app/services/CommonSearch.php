<?php
class CommonSearch
{
	//seach comment
	public static function searchComment($input)
	{
		$data = Comment::where(function ($query) use ($input)
		{
			if($input['user_name'] != '') {
				$listUser = User::where('user_name', 'like', '%'.$input['user_name'].'%')->lists('id');
				$query = $query->whereIn('user_id', $listUser);
			}
			if ($input['game_name'] != '') {

				$listGame = Game::where('name', 'like', '%'.$input['game_name'].'%')->lists('id');
				$query = $query->whereIn('model_id', $listGame);
			}
			if ($input['status'] != '') {
				$query = $query->where('status', $input['status']);
			}
			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date']);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

	//search score
	public static function searchScore($input)
	{
		$orderBy = self::searchScoreSortBy($input);
		$data = Score::where(function ($query) use ($input)
		{
			if($input['user_name'] != '') {
				$listUser = User::where('user_name', 'like', '%'.$input['user_name'].'%')->lists('id');
				$query = $query->whereIn('user_id', $listUser);
			}
			if ($input['game_name'] != '') {
				$listGame = Game::where('name', 'like', '%'.$input['game_name'].'%')->lists('id');
				$query = $query->whereIn('game_id', $listGame);
			}
			if($input['status'] != '')
				$query = $query->where('status', $input['status']);
			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date']);
			}
		})->orderBy($orderBy[0], $orderBy[1])
		->paginate(PAGINATE);
		return $data;
	}
	public static function searchScoreSortBy($input){
		$sortBy = 'id';
		$sort = 'desc';
		if($input['sortByScore'] != '') {
			if($input['sortByScore'] == 'score_asc') {
				$sortBy = 'score';
				$sort = 'asc';
			}
			if($input['sortByScore'] == 'score_desc') {
				$sortBy = 'score';
				$sort = 'desc';
			}
		// dd(123);
		return [$sortBy, $sort];
		}
		return [$sortBy, $sort];
	}

	//feedback search
	public static function seachFeedback($input){
		$data = Feedback::where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$query = $query->where('name','like' ,'%'.$input['name'].'%');
			}
			if ($input['email'] != '') {
				$query = $query->where('email','like' ,'%'.$input['email'].'%');
			}
			if ($input['title'] != '') {
				$query = $query->where('title','like' ,'%'.$input['title'].'%');
			}
			if ($input['status'] != '') {
				$query = $query->where('status', $input['status']);
			}
			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date']);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

	//feedback game search
	public static function seachFeedbackGame($input){
		$data = GameErrors::where(function ($query) use ($input)
		{
			if($input['name'] != '') {
				$listGame = Game::where('name', 'like', '%'.$input['name'].'%')->lists('id');
				$query = $query->whereIn('game_id', $listGame);
			}
			if ($input['status'] != '') {
				$query = $query->where('status', $input['status']);
			}
			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date']);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}

	//User search
	public static function seachUser($input){
		$data = User::where(function ($query) use ($input)
		{
			if($input['user_name'] != '') {
				$listGame = $query->where('user_name', 'like', '%'.$input['user_name'].'%');
			}

			if($input['start_date'] != ''){
				$query = $query->where('created_at', '>=', $input['start_date']);
			}
			if($input['end_date'] != ''){
				$query = $query->where('created_at', '<=', $input['end_date']);
			}
			if($input['from_update_at'] != ''){
				$query = $query->where('updated_at', '>=', $input['from_update_at']);
			}
			if($input['to_update_at'] != ''){
				$query = $query->where('updated_at', '<=', $input['to_update_at']);
			}
		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}
	//fronend search game
	public static function searchGame($input){
		$data = Game::where(function ($query) use ($input)
		{
			if(getDevice() == MOBILE)
			{
				$listGame = $query->where('parent_id', '!=', GAMEFLASH);
			}
			if($input['search'] != '') {
				// $listGame = $query->where('name', 'like', 'N%'.$input['search'].'%');
				$condition = array( '%'.$input['search'].'%' );
				$listGame = $query->whereRaw( 'games.name like ?', $condition);
			}

		})->whereNotNull('parent_id')->paginate(FRONENDPAGINATE);
		return $data;
	}
	//backend search history
	public static function searchlogHistory($input){
		$data = LogEdit::where(function ($query) use ($input)
		{
				$query = $query->where('editor_name', Auth::admin()->get()->username);
				$query = $query->where('action', LOGIN);
			if($input['start_date'] != '')
				$query = $query->where('updated_at', '>=', convertDateTime($input['start_date']));
			if($input['end_date'] != '')
				$query = $query->where('updated_at', '<=', convertDateTime($input['end_date']));

		})->orderBy('id', 'desc')->get();
		return $data;
	}
	//backend search type game
	public static function searchTypeGame($input){
		//dd($input);
		$data = Type::where(function ($query) use ($input)
		{
			if($input['type_id'])
			{
				$query = $query->where('id', $input['type_id'] );
			}
			if($input['parent_id'])
			{
				$listgametype  = GameType::where('type_id', $input['type_id'])->lists('game_id');
				$games =  Game::whereIn('id', $listgametype)->where('parent_id', $input['parent_id'])->lists('id');
				$listtypegame = GameType::whereIn('game_id', $games)->lists('type_id');
				$query = $query->whereIn('id', $listtypegame );
				
			}

		})->orderBy('id', 'desc')->paginate(PAGINATE);
		return $data;
	}
}
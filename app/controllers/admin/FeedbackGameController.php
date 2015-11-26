<?php 

class FeedbackGameController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputFeedbackGame = GameErrors::orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.feedback_game.index')->with(compact('inputFeedbackGame'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$status_feedback_game = GameErrors::find($id);
		if($status_feedback_game->status == ACTIVE)
		{
			$input['status'] = INACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}else{
			$input['status'] = ACTIVE;
			CommonNormal::update($id, ['status' => $input['status']]);
		}

		return Redirect::action('FeedbackGameController@index') ;
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	/**
	 * Seach Feedback game.
	 *
	 * @param  
	 * @return Response
	 */
	public function search(){
		$input = Input::all();
		$inputFeedbackGame = CommonSearch::seachFeedbackGame($input);
		return View::make('admin.feedback_game.index')->with(compact('inputFeedbackGame'));
	}


}

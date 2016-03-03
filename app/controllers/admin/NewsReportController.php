<?php

class NewsReportController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputNew = AdminNew::where('role_id', REPORTER)
			->where('status', '!=', SCRATCH_PAPER)
			->where('status', '!=', REJECT)
			->where('status', '!=', BACK)
			->orderBy('id', 'desc')->paginate(PAGINATE);
		return View::make('admin.news_report.index')->with(compact('inputNew'));
	}

	public function search()
	{
		$input = Input::all();
		$input['role_id'] = REPORTER;
		$inputNew = NewsManager::searchNews($input);
		return View::make('admin.news_report.index')->with(compact('inputNew'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.news_report.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$rules = NewsManager::getRuleByType();
		$input = Input::except('_token');
		$validator = Validator::make($input,$rules);
		if($validator->fails()) {
			return Redirect::action('NewsReportController@create')
	            ->withErrors($validator)
	            ->withInput(Input::except('_token'));
        } else {
        	//create news
        	$inputNews = Input::only('type_new_id', 'title', 'description','start_date', 'weight_number', 'position','sapo', 'status', 'is_hot', 'type');
        	if($inputNews['start_date'] == '') {
        		$inputNews['start_date'] = Carbon\Carbon::now();
        	}
        	// dd(Input::all());
        	$input = Input::all();
        	//insert role_id into news
			$inputNews['user_id'] = Auth::admin()->get()->id;
        	$inputNews['role_id'] = Auth::admin()->get()->role_id;
			$id = CommonNormal::create($inputNews, 'AdminNew');

			//upload image new
			$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url',UPLOAD_NEWS);
			CommonNormal::update($id, ['image_url' => $input['image_url']], 'AdminNew' );
			//upload image for new slide
			if (Input::get('type') == ACTIVE) {
				$listImage = $input['image_urls'];
				foreach ($listImage as $key => $value) {
					if ($value) {
						$path = UPLOAD_NEWS_SLIDE;
						$destinationPath = public_path().$path . '/' . $id;
						$filename = $value->getClientOriginalName();
						$uploadSuccess   =  $value->move($destinationPath, $filename);
						$slides['new_id'] = $id;
						$slides['image_url'] = $filename;
						$imageRelateId[] = NewSlide::create($slides)->id;
					}
				}
			}
			//create history
			$history_id = CommonLog::insertHistory('AdminNew', $id);

			//insert log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
			CommonLog::insertLogEdit('AdminNew', $id, $history_id, CREATE);

			// insert ceo
			CommonSeo::createSeo('AdminNew', $id, FOLDER_SEO_NEWS, $input['image_url']);
			if (Input::get('type') == ACTIVE) {
				return Redirect::action('NewsReportController@edit', $id);
			}
			return Redirect::action('NewsReportController@index');
        }
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
		$inputNew = AdminNew::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'AdminNew')->first();
		return View::make('admin.news_report.edit')->with(compact('inputNew','inputSeo'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		if(!Admin::isSeo()){
			$rules = NewsManager::getRuleByType();
			$input = Input::except('_token');
			$inputNews = Input::only('type_new_id', 'title', 'description','start_date',
	        		'weight_number', 'position', 'sapo', 'status', 'is_hot', 'type');
			$validator = Validator::make($input,$rules);
			if($validator->fails()) {
				return Redirect::action('NewsReportController@edit',$id)
		            ->withErrors($validator)
		            ->withInput($inputNews);
	        } else {
	        	//update News
	        
	        	if($inputNews['start_date'] == '') {
	        		$inputNews['start_date'] = Carbon\Carbon::now();
	        	}
				CommonNormal::update($id, $inputNews, 'AdminNew');

				//update upload image
				$imageNews = AdminNew::find($id);
				$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url',UPLOAD_NEWS,$imageNews->image_url);
				CommonNormal::update($id, ['image_url' => $input['image_url']], 'AdminNew' );
				//update sapo, image slide for new
				if (Input::get('type') == ACTIVE) {
					$listImage = $input['image_urls'];
					foreach ($listImage as $key => $value) {
						if ($value) {
							$path = UPLOAD_NEWS_SLIDE;
							$destinationPath = public_path().$path . '/' . $id;
							$filename = $value->getClientOriginalName();
							$uploadSuccess   =  $value->move($destinationPath, $filename);
							$slides['new_id'] = $id;
							$slides['image_url'] = $filename;
							$imageRelateId[] = NewSlide::create($slides)->id;
						}
					}
					$images = NewSlide::where('new_id', $id)->get();
					if ($images) {
						foreach ($images as $keySapo => $sapoSlide) {
							if (isset($input['image_sapo'])) {
								if (isset($input['image_sapo'][$keySapo])) {
									NewSlide::find($sapoSlide->id)->update([
										'sapo' => $input['image_sapo'][$keySapo],
									]);
								}
							}
						}
					}
				}
				if (Input::get('type') == INACTIVE) {
					//delete all image slide
					$images = NewSlide::where('new_id', $id)->delete();
				}
			}
        }
        	//create history
		$history_id = CommonLog::updateHistory('AdminNew', $id);
		//update log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
		CommonLog::insertLogEdit('AdminNew', $id, $history_id, EDIT);
    	//update seo
		CommonSeo::updateSeo('AdminNew', $id, FOLDER_SEO_NEWS, $input['image_url']);
		if (Input::get('type') == ACTIVE) {
			if ($input['image_urls'][0]) {
				return Redirect::action('NewsReportController@edit', $id);
			}
		}
		return Redirect::action('NewsReportController@index') ;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		AdminNew::find($id)->delete();
		return Redirect::action('NewsReportController@index') ;
	}

	public function history($id)
	{
		$historyId = CommonLog::getIdHistory('AdminNew', $id);
		if ($historyId) {
			$history = AdminHistory::find($historyId);
			$logEdit = $history->logedits;
			return View::make('admin.news_report.history')->with(compact('history', 'logEdit'));
		}
		return Redirect::action('NewsReportController@index')->with('message', 'Lịch sử game này đã bị xoá');

	}

	public function deleteHistory($id)
	{
		$history = AdminHistory::find($id);
		if ($history) {
			$history->logedits()->where('history_id', $id)->delete();
			$history->delete();
			return Redirect::action('NewsReportController@index')->with('message', 'Xoá lịch sử thành công');
		}
		return Redirect::action('NewsReportController@index');
	}

	public function updateNewsIndexData()
	{
		$newsId = Input::get('news_id');
		foreach($newsId as $key => $value) {
			$input = array(
				'index' => ACTIVE
				);
			CommonNormal::update($value, $input, 'AdminNew');
		}
		dd(1);
	}

	public function updateNewsIndexSelected()
	{
		$newsId = Input::get('news_id');
		foreach($newsId as $key => $value) {
			$input = array(
				'index' => INACTIVE
				);
			CommonNormal::update($value, $input, 'AdminNew');
		}
		dd(1);
	}

	public function deleteImageSlide($newId, $id)
	{
		NewSlide::find($id)->delete();
		return Redirect::action('NewsReportController@edit', $newId);
	}

}

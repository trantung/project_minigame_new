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
			->where('status', '=', SEND)
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
		// return View::make('admin.news_report.create');
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
		$inputNew = AdminNew::find($id);
		$inputSeo = AdminSeo::where('model_id', $id)->where('model_name', 'AdminNew')->first();
		if($inputNew->type == ACTIVE) {
			return View::make('admin.news_report.edit_slide')->with(compact('inputNew','inputSeo'));	
		} else {
			return View::make('admin.news_report.edit')->with(compact('inputNew','inputSeo'));
		}
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
			$type = AdminNew::find($id)->type;
			$rules = NewsManager::getRuleByType($type);
			$input = Input::except('_token');
			$inputNews = Input::only('type_new_id', 'title', 'description','start_date',
	        		'weight_number', 'position', 'sapo', 'sapo_text', 'status', 'is_hot', 'type', 'author', 'author_money');
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
	        	$inputNews['type'] = $type;
				AdminNew::find($id)->update($inputNews);

				//update upload image
				$imageNews = AdminNew::find($id);
				$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url',UPLOAD_NEWS,$imageNews->image_url);
				AdminNew::find($id)->update(['image_url' => $input['image_url']] );
				//update sapo, image slide for new
				NewsManager::uploadImageSlide($type, $input, $id);
			}
        }
        	//create history
		$history_id = CommonLog::updateHistory('AdminNew', $id);
		//update log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
		CommonLog::insertLogEdit('AdminNew', $id, $history_id, EDIT);
    	//update seo
		CommonSeo::updateSeo('AdminNew', $id, FOLDER_SEO_NEWS, $input['image_url']);
		if ($type == ACTIVE) {
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
		//
	}

	public function deleteImageSlide($newId, $id)
	{
		NewSlide::find($id)->delete();
		return Redirect::action('NewsReportController@edit', $newId);
	}

	public function approve($id)
	{
		AdminNew::find($id)->update(['status' => APPROVE, 'start_date' => Carbon\Carbon::now()]);
		return Redirect::action('NewsReportController@index');	
	}

	public function back($id)
	{
		AdminNew::find($id)->update(['status' => BACK]);
		return Redirect::action('NewsReportController@index');	
	}
}

<?php 

class NewsReporterController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputNew = AdminNew::whereIn('status', [SCRATCH_PAPER, BACK])
			->orderBy('id', 'desc')->paginate(PAGINATE);

		return View::make('admin.newsreporter.index')->with(compact('inputNew'));
	}
	public function search()
	{
		$input = Input::all();
		$inputNew = CommonSearch::searchNewsReporter($input);
		return View::make('admin.newsreporter.index')->with(compact('inputNew'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.newsreporter.create');
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
			return Redirect::action('NewsReporterController@create')
				->withErrors($validator)
				->withInput(Input::except('_token'));
		} else {
			//create news
			$inputNews = Input::only('type_new_id', 'title', 'description','start_date',  'position','sapo','is_hot', 'type');
			if($inputNews['start_date'] == '') {
				$inputNews['start_date'] = Carbon\Carbon::now();
			}
			$inputNews['user_id'] = Auth::admin()->get()->id;
        	$inputNews['role_id'] = Auth::admin()->get()->role_id;
        	$inputNews['status'] = SCRATCH_PAPER;
			$id = CommonNormal::create($inputNews);

			//upload image new
			$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url',UPLOAD_NEWS);
			CommonNormal::update($id, ['image_url' => $input['image_url']] );

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

			//chưa lam create history
			$history_id = CommonLog::insertHistory('AdminNew', $id);

			//insert log_edits: history_id, Auth::admin()->get()->id; editor_name, editor_time, editor_ip
			CommonLog::insertLogEdit('AdminNew', $id, $history_id, CREATE);

			// insert ceo
			CommonSeo::createSeo('AdminNew', $id, FOLDER_SEO_NEWS,$input['image_url']);
			if (Input::get('type') == ACTIVE) {
				return Redirect::action('NewsReporterController@edit', $id);
			}
			return Redirect::action('NewsReporterController@index');
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
		return View::make('admin.newsreporter.edit')->with(compact('inputNew','inputSeo'));
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
			$validator = Validator::make($input,$rules);
			$inputNews = Input::only('type_new_id', 'title', 'description','start_date', 'position','sapo', 'is_hot', 'type');
			if($validator->fails()) {
				return Redirect::action('NewsReporterController@edit',$id)
					->withErrors($validator)
					->withInput($inputNews);
			} else {
				//update News

				if($inputNews['start_date'] == '') {
					$inputNews['start_date'] = Carbon\Carbon::now();
				}
				$inputNews['user_id'] = Auth::admin()->get()->id;
				CommonNormal::update($id, $inputNews);

				//update upload image
				$imageNews = AdminNew::find($id);
				$input['image_url'] = CommonSeo::uploadImage($id, UPLOADIMG, 'image_url',UPLOAD_NEWS,$imageNews->image_url);
				CommonNormal::update($id, ['image_url' => $input['image_url']] );
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
			//upadte ceo

			CommonSeo::updateSeo('AdminNew', $id, FOLDER_SEO_NEWS,$input['image_url']);
			if (Input::get('type') == ACTIVE) {
			if ($input['image_urls'][0]) {
				return Redirect::action('NewsReporterController@edit', $id);
				}
			}
			return Redirect::action('NewsReporterController@index') ;
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		CommonNormal::delete($id);
		return Redirect::action('NewsReporterController@index') ;
	}

	/**
	 * update status news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function sendNews($id){
		$input['status'] = SEND;
		CommonNormal::update($id,$input);
		return Redirect::action('NewsReporterController@index') ;
	}


}
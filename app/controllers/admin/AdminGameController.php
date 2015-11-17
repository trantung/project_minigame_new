<?php

class AdminGameController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = Game::orderBy('id', 'asc')->paginate(PAGINATE);
		return View::make('admin.game.index')->with(compact('data'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.game.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// $rules = array(
		// 	'name' => 'required',
		// );
		// $input = Input::except('_token');
		// $validator = Validator::make($input,$rules);
		// if($validator->fails()) {
		// 	return Redirect::action('AdminGameController@create')
	 //            ->withErrors($validator);
  //       } else {
		// 	$id = CommonNormal::create($input);
		// 	$inputSeo = Input::except('_token', 'name');
		// 	CommonSeo::updateSeo($inputSeo, 'Game', $id);
		// 	$input['image_url_fb']= CommonSeo::uploadImage($inputSeo, $id, UPLOADIMG_GAME, 'image_url_fb');
		// 	CommonSeo::updateSeo(['image_url_fb' => $input['image_url_fb']], 'Type', $id);
		// 	return Redirect::action('AdminGameController@index') ;
  //       }

		// assuming file.zip is in the same directory as the executing script.
		//$file = public_path().'/download/'.'file.apk';

		// get the absolute path to $file


		//up game zip ->file
		$destinationPath = $this->createFolder('games'); //uploads
		if(Input::hasFile('link_upload_game')){
			$file = Input::file('link_upload_game');
			$filename = $file->getClientOriginalName();
			$upload_success = Input::file('link_upload_game')->move($destinationPath, $filename);
		}
		// get the absolute path to $file
		$path = pathinfo(realpath($destinationPath[0]), PATHINFO_DIRNAME).'/'.$destinationPath[1];

		$zip = new ZipArchive;
		$res = $zip->open($file);
		if ($res === TRUE) {
		  // extract it to the path we determined above
		  $zip->extractTo($path);
		  $zip->close();
		  echo "OK!";
		} else {
		  echo "Error!";
		}
	}

	private function createFolder($folder)
	{
		$path = public_path().'/'.$folder;
		if(!File::exists($path)) {
		    // path does not exist
		    File::makeDirectory($path, $mode = 0755, true, true);
		}
		return $path;
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
		//
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


}

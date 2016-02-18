<?php

class SiteNewsController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$now = date('Y-m-d');
		$inputListNews = AdminNew::where('start_date', '<=', Carbon\Carbon::now())->orderBy('id', 'desc')
		->paginate(FRONENDPAGINATE);
		return View::make('site.News.listNews')->with(compact('inputListNews'));
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
	// public function show($slug)
	// {
	// 	$now = date('Y-m-d');
	// 	$inputNew = AdminNew::findBySlug($slug);
	// 	$input['count_view'] = getZero($inputNew->count_view) + 1;
	// 	CommonNormal::update($inputNew->id, $input, 'AdminNew');
	// 	$inputRelated = AdminNew::where('type_new_id', $inputNew->type_new_id)->where('start_date', '<=', $now)->orderBy(DB::raw('RAND()'))->limit(PAGINATE_RELATED)->get();
	// 	return View::make('site.News.showNews')->with(compact('inputNew', 'inputRelated'));
	// }

	public function listNews($slug)
	{
		// $newTypeId = TypeNew::findBySlug($slug)->id;
		$newType = TypeNew::findBySlug($slug);
		$news = AdminNew::where('type_new_id', $newType->id)
			->where('start_date', '<=', Carbon\Carbon::now())
			->orderBy('weight_number', 'asc')
			->paginate(FRONENDPAGINATE);
		return View::make('site.News.showType')->with(compact('newType', 'news'));
	}
	public function showDetail($slugType, $slugNew)
	{
		$now = date('Y-m-d');
		$newType = TypeNew::findBySlug($slugType);
		$inputNew = AdminNew::findBySlug($slugNew);
		$input['count_view'] = getZero($inputNew->count_view) + 1;
		CommonNormal::update($inputNew->id, $input, 'AdminNew');
		$inputRelated = AdminNew::where('type_new_id', $inputNew->type_new_id)
			->where('start_date', '<=', $now)
			->orderBy(DB::raw('RAND()'))
			->limit(PAGINATE_RELATED)
			->get();
		return View::make('site.News.showNews')->with(compact('newType', 'inputNew', 'inputRelated'));
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

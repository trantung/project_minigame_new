<?php 

class RelationController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$inputRelation = Relation::orderBy('id', 'asc')->paginate(PAGINATE);	
		return View::make('admin.relation.index')->with(compact('inputRelation'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$arrCategoryParent = CategoryParent::orderBy('id', 'desc')->get();
		$arrCategory = Game::where('parent_id',  null)->get();
		return View::make('admin.relation.create')->with(compact('arrCategoryParent'),compact('arrCategory'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		dd(123);
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
	public function ajax()
	{
		$type_model = Input::get('type_model');

		$parent = CategoryParent::where('position',$type_model)->lists('name','id')->get();
		// dd(Response::json($parent));
		// Response::json(['data' => $categories], 200);
		// dd(Response::json(['data' => $parent], 200));
		return Response::json($parent);
	}


}

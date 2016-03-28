<?php

class AdTestController extends SiteController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('adtest');
	}

	public function index2()
	{
		return View::make('adtest2');
	}

}

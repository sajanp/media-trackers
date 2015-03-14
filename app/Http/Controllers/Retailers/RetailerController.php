<?php namespace App\Http\Controllers\Retailers;

use App\Http\Controllers\Controller;
use Request;

class RetailerController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('retailer.index');
	}

	public function create()
	{
		return view('retailer.create');
	}

	public function store()
	{
		return Request::all();
	}

}

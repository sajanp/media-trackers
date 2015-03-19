<?php namespace App\Http\Controllers\Retailers;

use App\Http\Controllers\Controller;
use App\Entities\Retailer\RetailerInterface;
use App\Entities\Retailer\EloquentRetailer as Retailer;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

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

	public function store(RetailerInterface $retailers, Request $request)
	{
		try
		{
			$retailers->create([
				'name' => $request->input('name'),
				'isDigital' => $request->input('isDigital', false),
				'isUltraviolet' => $request->input('isUltraviolet', false),
				'isRentable' => $request->input('isRentable', false),
				'isOwnable' => $request->input('isOwnable', false),
			]);

			return redirect()->route('retailer.index');
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function show($id)
	{
		return view('retailer.show');
	}

	public function edit($id)
	{
		return view('retailer.edit');
	}

}

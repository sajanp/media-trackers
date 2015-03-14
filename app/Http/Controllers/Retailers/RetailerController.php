<?php namespace App\Http\Controllers\Retailers;

use App\Http\Controllers\Controller;
use App\Entities\Retailer\RetailerInterface;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class RetailerController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index(RetailerInterface $retailer)
	{
		$retailers = $retailer->all();

		return view('retailer.index')->withRetailers($retailers);
	}

	public function create()
	{
		return view('retailer.create');
	}

	public function store(RetailerInterface $retailer, Request $request)
	{
		try
		{
			$retailer->create([
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

}

<?php namespace App\Http\Controllers\Retailer;

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
				'isOwnable' => $request->input('isOwnable', false),
				'isRentable' => $request->input('isRentable', false),
				'isDigital' => $request->input('isDigital', false),
				'isUltraviolet' => $request->input('isUltraviolet', false)
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

	public function update(RetailerInterface $retailers, Request $request, $id)
	{
		try
		{
			$retailers->updateById($id, [
				'name' => $request->input('name'),
				'isOwnable' => $request->input('isOwnable', false),
				'isRentable' => $request->input('isRentable', false),
				'isDigital' => $request->input('isDigital', false),
				'isUltraviolet' => $request->input('isUltraviolet', false)
			]);

			return redirect()->route('retailer.show', $id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

}

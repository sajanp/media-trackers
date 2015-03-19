<?php namespace App\Http\Controllers\Theaters;

use App\Http\Controllers\Controller;
use App\Entities\Theater\TheaterInterface;
use App\Entities\Theater\EloquentTheater as Theater;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class TheaterController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('theater.index');
	}

	public function create()
	{
		return view('theater.create');
	}

	public function store(TheaterInterface $theaters, Request $request)
	{
		try
		{
			$theaters->create($request->only(
				'name',
				'location'
				)
			);

			return redirect()->route('theater.index');
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function show($id)
	{
		return view('theater.show');
	}

	public function edit($id)
	{
		return view('theater.edit');
	}

	public function update(TheaterInterface $theaters, Request $request, $id)
	{
		try
		{
			$theaters->updateById($id, $request->only(
				'name',
				'location'
				)
			);

			return redirect()->route('theater.show', $id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

}

<?php namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Entities\Movie\MovieInterface;
use App\Entities\Movie\EloquentMovie as Movie;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class MovieController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('movie.index');
	}

	public function show($id)
	{
		return view('movie.show');
	}

	public function create()
	{
		return view('movie.create');
	}

	public function multiCreate()
	{
		return view ('movie.multi-create');
	}

	public function multiStore(MovieInterface $movies, Request $request)
	{
		foreach ($request->get('movies') as $m)
		{
			if (strlen($m['title']) > 0)
			{
				$movie = $movies->create([
					'title' => $m['title'],
				]);
			}
		}

		return redirect()->route('movie.index');
	}

	public function store(MovieInterface $movies, Request $request)
	{
		try
		{
			$movie = $movies->create([
				'title' => $request->input('title'),
			]);

			return redirect()->route('movie.show', $movie->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function edit($id)
	{
		return view('movie.edit');
	}

	public function update(MovieInterface $movies, Request $request, $id)
	{
		try
		{
			$movie = $movies->updateById($id, [
				'title' => $request->input('title'),
			]);

			return redirect()->route('movie.show', $movie->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function destroy(MovieInterface $movies, $id)
	{
		$movies->deleteById($id);

		return redirect()->route('movie.index');
	}

}

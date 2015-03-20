<?php namespace App\Http\Controllers\Title;

use App\Http\Controllers\Controller;
use App\Entities\Title\TitleInterface;
use App\Entities\Title\EloquentTitle as Title;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class TitleController extends Controller {

	public function create()
	{
		return view('title.create');
	}

	public function store(TitleInterface $titles, Request $request)
	{
		try
		{
			$title = $titles->create([
				'title' => $request->input('title'),
				'isTV' => $request->input('isTV', false)	
			]);

			if ($title->isTV)
			{
				return redirect()->route('tv.show', $title->id);
			}
			
			return redirect()->route('movie.show', $title->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function edit($id)
	{
		return view('title.edit');
	}

	public function update(TitleInterface $titles, Request $request, $id)
	{
		try
		{
			$title = $titles->updateById($id, [
				'title' => $request->input('title'),
				'isTV' => $request->input('isTV', false)	
			]);

			if ($title->isTV)
			{
				return redirect()->route('tv.show', $title->id);
			}
			
			return redirect()->route('movie.show', $title->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

}

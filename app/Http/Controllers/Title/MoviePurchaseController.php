<?php namespace App\Http\Controllers\Title;

use App\Http\Controllers\Controller;
use App\Entities\Title\TitleInterface;
use App\Entities\Title\EloquentTitle as Title;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class MoviePurchaseController extends Controller {

	public function create($movieId)
	{
		return view('title.movie.purchase.create');
	}

	public function store(Request $request, $movieId)
	{
		dd($request->all());
	}

}

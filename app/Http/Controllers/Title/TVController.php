<?php namespace App\Http\Controllers\Title;

use App\Http\Controllers\Controller;
use App\Entities\Title\TitleInterface;
use App\Entities\Title\EloquentTitle as Title;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class TVController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('title.tv.index');
	}

	public function show($id)
	{
		return view('title.tv.show');
	}

}

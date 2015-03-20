<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Title\TitleInterface;
use Illuminate\Routing\Router;

class MovieViewComposer {

	private $request;
	private $titles;
	private $router;

	public function __construct(Request $request, TitleInterface $titles, Router $router)
	{
		$this->request = $request;
		$this->titles = $titles;
		$this->router = $router;
	}

	public function show(View $view)
	{
		$view->with('movie', $this->titles->getMovieById($this->router->input('movie')));
	}

	public function index(View $view)
	{
		$view->with('movies', $this->titles->allMovies());
	}
}
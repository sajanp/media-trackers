<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Title\TitleInterface;
use Illuminate\Routing\Router;

class TVViewComposer {

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
		$view->with('tv', $this->titles->getTVById($this->router->input('tv')));
	}

	public function index(View $view)
	{
		$view->with('tvTitles', $this->titles->allTV());
	}
}
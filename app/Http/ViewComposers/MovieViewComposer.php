<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Title\TitleInterface;
use App\Entities\Format\FormatInterface;
use App\Entities\Purchase\PurchaseInterface;
use Illuminate\Routing\Router;

class MovieViewComposer {

	private $request;
	private $titles;
	private $router;
	private $formats;
	private $purchases;

	public function __construct(Request $request, TitleInterface $titles, FormatInterface $formats, Router $router, PurchaseInterface $purchases)
	{
		$this->request = $request;
		$this->titles = $titles;
		$this->formats = $formats;
		$this->router = $router;
		$this->purchases = $purchases;
	}

	public function show(View $view)
	{
		$view->with('movie', $this->titles->getMovieById($this->router->input('movie')));
		$view->with('formats', $this->formats->allOwnable()->lists('name', 'id'));

		$purchase = $this->purchases->getOpen();

		$view->with('purchase', $purchase);
	}

	public function index(View $view)
	{
		$view->with('movies', $this->titles->allMovies(['purchases', 'ultraviolet']));
		$view->with('formats', $this->formats->allOwnable());
	}
}
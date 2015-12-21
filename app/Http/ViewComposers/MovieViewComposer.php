<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Movie\MovieInterface;
use App\Entities\Format\FormatInterface;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Retailer\RetailerInterface;
use Illuminate\Routing\Router;

class MovieViewComposer {

	private $request;
	private $movies;
	private $router;
	private $formats;
	private $purchases;
	private $retailers;

	public function __construct(RetailerInterface $retailers, Request $request, MovieInterface $movies, FormatInterface $formats, Router $router, PurchaseInterface $purchases)
	{
		$this->request = $request;
		$this->movies = $movies;
		$this->formats = $formats;
		$this->router = $router;
		$this->purchases = $purchases;
		$this->retailers = $retailers;
	}

	public function show(View $view)
	{
		$view->with('movie', $this->movies->getById($this->router->input('movie')));
		$view->with('formats', $this->formats->allOwnable()->lists('name', 'id')->all());
		$view->with('editions', $this->movies->editionsOwned($this->router->input('movie')));

		$purchase = $this->purchases->getOpen();

		$view->with('purchase', $purchase);
	}

	public function index(View $view)
	{
		$view->with('movies', $this->movies->all(['purchases', 'ultraviolet']));
		$view->with('formats', $this->formats->allOwnable());
	}

	public function purchaseCreate(View $view)
	{
		$movie = $this->movies->getById($this->router->input('movie'));

		$data = [
			'retailers' => $this->retailers->allOwnable()->lists('name', 'id')->all(),
			'purchase' => $this->purchases->fresh(),
			'movie' => $movie,
			'formDestination' => ['movie.purchase.store', $movie->id],
			'formMethod' => 'post',
			'formSubmit' => 'Add Purchase',
			'formats' => $this->formats->allOwnable(),
			'typeaheadMovieTitles' => json_encode($this->movies->all()->lists('title')->all())
		];

		$view->with($data);
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'movie' => $this->movies->fresh(),
				'formDestination' => 'movie.store',
				'formMethod' => 'post',
				'formSubmit' => 'Add New Title'
			];
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'movie' => $this->movies->getById($this->router->input('movie')),
				'formDestination' => ['movie.update', $this->router->input('movie')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Movie'
			];
		}

		$view->with($data);
	}
}

<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Retailer\RetailerInterface;
use App\Entities\Format\FormatInterface;
use App\Entities\Movie\MovieInterface;
use Illuminate\Routing\Router;

class PurchaseableViewComposer {

	private $request;
	private $retailers;
	private $purchases;
	private $router;
	private $format;
	private $movies;

	public function __construct(MovieInterface $movies, Request $request, RetailerInterface $retailers, PurchaseInterface $purchases, Router $router, FormatInterface $formats)
	{
		$this->request = $request;
		$this->retailers = $retailers;
		$this->purchases = $purchases;
		$this->router = $router;
		$this->formats = $formats;
		$this->movies = $movies;
	}

	public function edit(View $view)
	{
		$data['purchase'] = $this->purchases->getById($this->router->input('purchase'));
		$data['purchaseable'] = $this->purchases->getPurchaseableById($data['purchase']->id, $this->router->input('purchaseable'));

		$view->with($data);
		$view->with('formats', $this->formats->allOwnable());
	}
}

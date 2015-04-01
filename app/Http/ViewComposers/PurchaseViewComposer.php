<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Retailer\RetailerInterface;
use Illuminate\Routing\Router;

class PurchaseViewComposer {

	private $request;
	private $retailers;
	private $purchases;
	private $router;

	public function __construct(Request $request, RetailerInterface $retailers, PurchaseInterface $purchases, Router $router)
	{
		$this->request = $request;
		$this->retailers = $retailers;
		$this->purchases = $purchases;
		$this->router = $router;
	}

	public function index(View $view)
	{
		$view->with('purchases', $this->purchases->getAll(['retailer', 'movies']));
	}

	public function show(View $view)
	{
		$view->with('purchase', $this->purchases->getById($this->router->input('purchase')));
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'purchase' => $this->purchases->fresh(),
				'formDestination' => 'purchase.store',
				'formMethod' => 'post',
				'formSubmit' => 'Start New Purchase'
			]; 
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'purchase' => $this->purchases->getById($this->router->input('purchase')),
				'formDestination' => ['purchase.update', $this->router->input('purchase')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Purchase'
			];	
		}

		$data['retailers'] = $this->retailers->allOwnable()->lists('name', 'id');

		$view->with($data);
	}
}
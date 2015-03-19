<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Retailer\RetailerInterface;
use Illuminate\Routing\Router;

class RetailerViewComposer {

	private $request;
	private $retailers;
	private $router;

	public function __construct(Request $request, RetailerInterface $retailers, Router $router)
	{
		$this->request = $request;
		$this->retailers = $retailers;
		$this->router = $router;
	}

	public function show(View $view)
	{
		$view->with('retailer', $this->retailers->getById($this->router->input('retailer')));
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'retailer' => $this->retailers->fresh(),
				'formDestination' => 'retailer.store',
				'formMethod' => 'post',
				'formSubmit' => 'Add New Retailer'
			]; 
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'retailer' => $this->retailers->getById($this->router->input('retailer')),
				'formDestination' => ['retailer.update', $this->router->input('retailer')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Retailer'
			];	
		}

		$view->with($data);
	}

	public function index(View $view)
	{
		$view->with('retailers', $this->retailers->all());
	}
}
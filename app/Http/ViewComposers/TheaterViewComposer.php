<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Theater\TheaterInterface;
use Illuminate\Routing\Router;

class TheaterViewComposer {

	private $request;
	private $theaters;
	private $router;

	public function __construct(Request $request, TheaterInterface $theaters, Router $router)
	{
		$this->request = $request;
		$this->theaters = $theaters;
		$this->router = $router;
	}

	public function show(View $view)
	{
		$view->with('theater', $this->theaters->getById($this->router->input('theater')));
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'theater' => $this->theaters->fresh(),
				'formDestination' => 'theater.store',
				'formMethod' => 'post',
				'formSubmit' => 'Add New Theater'
			]; 
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'theater' => $this->theaters->getById($this->router->input('theater')),
				'formDestination' => ['theater.update', $this->router->input('theater')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Theater'
			];	
		}

		$view->with($data);
	}

	public function index(View $view)
	{
		$view->with('theaters', $this->theaters->all());
	}
}
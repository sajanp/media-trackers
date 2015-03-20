<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Title\TitleInterface;
use Illuminate\Routing\Router;

class TitleViewComposer {

	private $request;
	private $titles;
	private $router;

	public function __construct(Request $request, TitleInterface $titles, Router $router)
	{
		$this->request = $request;
		$this->titles = $titles;
		$this->router = $router;
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'title' => $this->titles->fresh(),
				'formDestination' => 'title.store',
				'formMethod' => 'post',
				'formSubmit' => 'Add New Title'
			]; 
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'title' => $this->titles->getById($this->router->input('title')),
				'formDestination' => ['title.update', $this->router->input('title')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Title'
			];	
		}

		$view->with($data);
	}

}
<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Subscription\SubscriptionInterface;
use Illuminate\Routing\Router;

class SubscriptionViewComposer {

	private $request;
	private $subscriptions;
	private $router;

	public function __construct(Request $request, SubscriptionInterface $subscriptions, Router $router)
	{
		$this->request = $request;
		$this->subscriptions = $subscriptions;
		$this->router = $router;
	}

	public function show(View $view)
	{
		$view->with('subscription', $this->subscriptions->getById($this->router->input('subscription')));
	}

	public function modelForm(View $view)
	{
		if (in_array('create', $this->request->segments()))
		{
			$data = [
				'subscription' => $this->subscriptions->fresh(),
				'formDestination' => 'subscription.store',
				'formMethod' => 'post',
				'formSubmit' => 'Add New Subscription'
			]; 
		}
		elseif (in_array('edit', $this->request->segments()))
		{
			$data = [
				'subscription' => $this->subscriptions->getById($this->router->input('subscription')),
				'formDestination' => ['subscription.update', $this->router->input('subscription')],
				'formMethod' => 'put',
				'formSubmit' => 'Update Subscription'
			];	
		}

		$view->with($data);
	}

	public function index(View $view)
	{
		$view->with('subscriptions', $this->subscriptions->all());
	}
}
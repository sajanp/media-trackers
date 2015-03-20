<?php namespace App\Http\Controllers\Subscription;

use App\Http\Controllers\Controller;
use App\Entities\Subscription\SubscriptionInterface;
use App\Entities\Subscription\EloquentSubscription as Subscription;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class SubscriptionController extends Controller {

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('subscription.index');
	}

	public function create()
	{
		return view('subscription.create');
	}

	public function store(SubscriptionInterface $subscriptions, Request $request)
	{
		try
		{
			$subscriptions->create($request->only(
				'name'
				)
			);

			return redirect()->route('subscription.index');
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function show($id)
	{
		return view('subscription.show');
	}

	public function edit($id)
	{
		return view('subscription.edit');
	}

	public function update(SubscriptionInterface $subscriptions, Request $request, $id)
	{
		try
		{
			$subscriptions->updateById($id, $request->only(
				'name',
				'location'
				)
			);

			return redirect()->route('subscription.show', $id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

}

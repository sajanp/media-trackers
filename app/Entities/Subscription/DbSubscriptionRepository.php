<?php namespace App\Entities\Subscription;

use App\Entities\Subscription\EloquentSubscription as Subscription;
use Illuminate\Support\Collection;

class DbSubscriptionRepository implements SubscriptionInterface {

	public function fresh()
	{
		return new Subscription;
	}

	public function create(array $properties)
	{
		if (Subscription::create($properties))
		{
			return true;
		}

		return false;
	}

	public function getById($id)
	{
		return Subscription::findOrFail($id);
	}

	public function all(array $with = array())
	{
		return Subscription::orderBy('name')->get();
	}

	public function updateById($id, array $properties)
	{
		$subscription = $this->getById($id);

		$subscription->name = $properties['name'];

		$subscription->save();
	}
}
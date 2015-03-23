<?php namespace App\Entities\Purchase;

use App\Entities\Purchase\EloquentPurchase as Purchase;

class DbPurchaseRepository implements PurchaseInterface {

	public function fresh()
	{
		return new Purchase;
	}

	public function create(array $properties)
	{
		$purchase = $this->fresh();

		$purchase->closed = array_get($properties, 'closed', false);
		$purchase->retailer_id = array_get($properties, 'retailer_id');
		$purchase->amount = array_get($properties, 'amount') * 100;
		$purchase->notes = array_get($properties, 'notes');
		$purchase->purchased_on = array_get($properties, 'purchased_on');

		if ($purchase->save())
		{
			return $purchase;
		}

		return false;
	}
}
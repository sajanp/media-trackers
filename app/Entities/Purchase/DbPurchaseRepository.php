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
		$purchase->note = array_get($properties, 'note');
		$purchase->purchased_on = array_get($properties, 'purchased_on');

		if ($purchase->save())
		{
			return $purchase;
		}

		return false;
	}

	public function getById($id, array $properties = array())
	{
		return Purchase::with($properties)->where('id', $id)->first();
	}

	public function getOpen()
	{
		if (Purchase::open()->count() == 1)
		{
			return Purchase::open()->first();
		}

		return false;
	}

	public function closePurchase($id)
	{
		$purchase = $this->getById($id);
		$purchase->closed = true;
		$purchase->save();
	}

	public function openPurchase($id)
	{
		if (!$this->getOpen())
		{
			$purchase = $this->getById($id);
			$purchase->closed = false;
			$purchase->save();

			return $purchase;
		}
		else
		{
			return false;
		}
	}

	public function deleteEmptyPurchases()
	{
		foreach(Purchase::has('movies', '=', 0)->get() as $purchase)
		{
			$purchase->delete();
		}

		return true;
	}

	public function getAll(array $with = array())
	{
		return Purchase::with($with)->orderBy('purchased_on')->get();
	}
}
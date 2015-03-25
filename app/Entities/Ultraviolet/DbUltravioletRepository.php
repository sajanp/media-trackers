<?php namespace App\Entities\Ultraviolet;

use App\Entities\Ultraviolet\EloquentUltraviolet as Ultraviolet;
use App\Entities\Purchase\EloquentPurchase as Purchase;
use Illuminate\Database\Eloquent\Model;

class DbUltravioletRepository implements UltravioletInterface {

	public function create(Model $model, Purchase $purchase)
	{
		if ($this->checkExistence($model, $purchase))
		{
			$ultraviolet = new Ultraviolet;
			$ultraviolet->purchase_id = $purchase->id;

			$model->ultraviolet()->save($ultraviolet);
		}
	}

	private function checkExistence(Model $model, Purchase $purchase)
	{
		if ($model->ultraviolet()->where('purchase_id', $purchase->id)->count())
		{
			return false;
		}

		return true;
	}
}
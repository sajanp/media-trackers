<?php namespace App\Entities\Ultraviolet;

use App\Entities\Ultraviolet\EloquentUltraviolet as Ultraviolet;
use App\Entities\Purchase\EloquentPurchase as Purchase;
use Illuminate\Database\Eloquent\Model;
use DB;
class DbUltravioletRepository implements UltravioletInterface {

	public function create(Model $model, Purchase $purchase, $edition)
	{
		if ($this->checkExistence($model, $edition))
		{
			$purchaseable_id = DB::table('purchaseables')
				->select('id')
				->where('purchase_id', $purchase->id)
				->where('purchaseable_type', get_class($model))
				->where('edition', $edition)
				->orderBy('id', 'desc')
				->first()->id;

			$ultraviolet = new Ultraviolet;
			$ultraviolet->purchase_id = $purchase->id;
			$ultraviolet->purchaseable_id = $purchaseable_id;

			$model->ultraviolet()->save($ultraviolet);
		}
	}

	public function delete($purchaseableId)
	{
		$ultraviolet = Ultraviolet::where('purchaseable_id', $purchaseableId)->first();

		if ($ultraviolet)
		{
			$ultraviolet->delete();
		}
	}

	private function checkExistence(Model $model, $edition)
	{
		if ($model->ultraviolet()->whereHas('purchaseable', function($query) use ($edition)
			{
				$query->where('edition', $edition);
			})->exists())
		{
			return false;
		}

		return true;
	}
}
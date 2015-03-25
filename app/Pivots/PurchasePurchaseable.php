<?php namespace App\Pivots;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphPivot;

class PurchasePurchaseable extends MorphPivot {

	protected $table = 'purchaseables';

	public function format()
	{
		return $this->belongsTo('App\Entities\Format\EloquentFormat', 'format_id');
	}

	public function ultraviolet()
	{
		return $this->hasOne('App\Entities\Ultraviolet\EloquentUltraviolet', 'purchaseable_id');
	}
}
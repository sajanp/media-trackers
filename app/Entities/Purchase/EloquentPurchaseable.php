<?php namespace App\Entities\Purchase;

use Illuminate\Database\Eloquent\Model;
use App\Pivots\PurchasePurchaseable;
use App\Pivots\PurchaseMorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class EloquentPurchaseable extends Model {

	public $timestamps = false;
	protected $table = 'purchaseables';
	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function purchaseable()
	{
		return $this->morphTo();
	}

	public function ultraviolet()
	{
		return $this->hasOne('App\Entities\Ultraviolet\EloquentUltraviolet', 'purchaseable_id');
	}

	public function format()
	{
		return $this->belongsto('App\Entities\Format\EloquentFormat');
	}

}
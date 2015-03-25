<?php namespace App\Entities\Purchase;

use Illuminate\Database\Eloquent\Model;
use App\Pivots\PurchasePurchaseable;
use App\Pivots\PurchaseMorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class EloquentPurchaseable extends Model {

	protected $table = 'purchaseables';
	protected $guarded = ['id', 'updated_at', 'created_at'];

}
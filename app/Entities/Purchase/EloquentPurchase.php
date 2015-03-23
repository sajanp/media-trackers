<?php namespace App\Entities\Purchase;

use Illuminate\Database\Eloquent\Model;

class EloquentPurchase extends Model {

	protected $table = 'purchases';
	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function retailer()
	{
		return $this->belongsTo('App\Entities\Retailer\EloquentRetailer');
	}

	public function movies()
	{
		return $this->morphedByMany('App\Entities\Title\EloquentTitle', 'purchaseable');
	}

	public function getDates()
	{
		return ['created_at', 'updated_at', 'purchased_on'];
	}
}
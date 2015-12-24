<?php namespace App\Entities\Retailer;

use Illuminate\Database\Eloquent\Model;

class EloquentRetailer extends Model {

	protected $table = 'retailers';
	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function scopeOwnable($query)
	{
		return $query->where('isOwnable', true);
	}

	public function scopeRentable($query)
	{
		return $query->where('isRentable', true);
	}
}
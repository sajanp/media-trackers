<?php namespace App\Entities\Title;

use Illuminate\Database\Eloquent\Model;

class EloquentTitle extends Model {

	protected $table = 'titles';
	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function scopeMovies($query)
	{
		return $query->where('isTV', false);
	}

	public function scopeTV($query)
	{
		return $query->where('isTV', true);
	}

	public function purchases()
	{
		return $this->morphToMany('App\Entities\Purchase\EloquentPurchase', 'purchaseable');
	}
}
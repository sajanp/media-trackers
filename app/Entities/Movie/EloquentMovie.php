<?php namespace App\Entities\Movie;

use Illuminate\Database\Eloquent\Model;

class EloquentMovie extends Model {

	protected $table = 'movies';
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
		return $this->morphToMany('App\Entities\Purchase\EloquentPurchase', 'purchaseable', null, 'purchaseable_id', 'purchase_id')->withPivot('format_id', 'id');
	}

	public function ultraviolet()
	{
		return $this->morphMany('App\Entities\Ultraviolet\EloquentUltraviolet', 'ultravioletable');
	}
}

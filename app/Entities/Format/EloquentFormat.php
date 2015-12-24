<?php namespace App\Entities\Format;

use Illuminate\Database\Eloquent\Model;

class EloquentFormat extends Model {

	protected $table = 'formats';
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
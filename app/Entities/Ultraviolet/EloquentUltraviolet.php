<?php namespace App\Entities\Ultraviolet;

use Illuminate\Database\Eloquent\Model;

class EloquentUltraviolet extends Model {
	protected $table = 'ultraviolet';
	protected $guarded = ['id', 'created_at', 'updated_at'];

	public function purchase()
	{
		return $this->belongsTo('App\Entities\Purchase\EloquentPurchase');
	}

	public function ultravioletable()
	{
		return $this->morphTo();
	}
}
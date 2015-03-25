<?php namespace App\Entities\Ultraviolet;

use Illuminate\Database\Eloquent\Model;
use App\Entities\Purchase\EloquentPurchase as Purchase;

interface UltravioletInterface {
	public function create(Model $ultravioletable, Purchase $purchase);
}
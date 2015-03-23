<?php namespace App\Entities\Purchase;

interface PurchaseInterface {

	public function fresh();
	public function create(array $properties);
}
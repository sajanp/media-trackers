<?php namespace App\Entities\Purchase;

interface PurchaseInterface {

	public function fresh();
	public function create(array $properties);
	public function getOpen();
	public function getById($id, array $with);
}
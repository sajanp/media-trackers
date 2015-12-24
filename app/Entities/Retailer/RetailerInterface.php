<?php namespace App\Entities\Retailer;

interface RetailerInterface {

	public function fresh();
	public function create(array $properties);
	public function getById($id);
	public function all(array $with);
	public function allOwnable(array $with);
	public function allRentable(array $with);
	public function updateById($id, array $properties);
}
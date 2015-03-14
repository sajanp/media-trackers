<?php namespace App\Entities\Retailer;

interface RetailerInterface {

	public function create(array $properties);
	public function all(array $with);
}
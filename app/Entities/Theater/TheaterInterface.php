<?php namespace App\Entities\Theater;

interface TheaterInterface {

	public function fresh();
	public function create(array $properties);
	public function getById($id);
	public function all(array $with);
	public function updateById($id, array $properties);
}
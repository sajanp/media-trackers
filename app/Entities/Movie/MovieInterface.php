<?php namespace App\Entities\Movie;

interface MovieInterface {

	public function fresh();
	public function create(array $properties);
	public function getById($id);
	public function all(array $with);
	public function updateById($id, array $properties);
	public function deleteById($id);
}

<?php namespace App\Entities\Title;

interface TitleInterface {

	public function fresh();
	public function create(array $properties);
	public function getById($id);
	public function getMovieById($id);
	public function getTVById($id);
	public function all(array $with);
	public function allMovies(array $with);
	public function allTV(array $with);
}
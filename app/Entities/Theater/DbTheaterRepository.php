<?php namespace App\Entities\Theater;

use App\Entities\Theater\EloquentTheater as Theater;
use Illuminate\Support\Collection;

class DbTheaterRepository implements TheaterInterface {

	public function fresh()
	{
		return new Theater;
	}

	public function create(array $properties)
	{
		if (Theater::create($properties))
		{
			return true;
		}

		return false;
	}

	public function getById($id)
	{
		return Theater::findOrFail($id);
	}

	public function all(array $with = array())
	{
		return Theater::orderBy('name')->get();
	}

	public function updateById($id, array $properties)
	{
		$theater = $this->getById($id);

		$theater->name = $properties['name'];
		$theater->location = $properties['location'];

		$theater->save();
	}
}
<?php namespace App\Entities\Retailer;

use App\Entities\Retailer\EloquentRetailer as Retailer;
use Illuminate\Support\Collection;

class DbRetailerRepository implements RetailerInterface {

	public function fresh()
	{
		return new Retailer;
	}

	public function create(array $properties)
	{
		if (Retailer::create($properties))
		{
			return true;
		}

		return false;
	}

	public function getById($id)
	{
		return Retailer::findOrFail($id);
	}

	public function all(array $with = array())
	{
		return Retailer::orderBy('name')->get();
	}

	public function allOwnable(array $with = array())
	{
		return Retailer::ownable()->get(['name', 'id']);
	}

	public function updateById($id, array $properties)
	{
		$retailer = $this->getById($id);

		$retailer->name = $properties['name'];
		$retailer->isOwnable = $properties['isOwnable'];
		$retailer->isRentable = $properties['isRentable'];
		$retailer->isDigital = $properties['isDigital'];
		$retailer->isUltraviolet = $properties['isUltraviolet'];

		$retailer->save();
	}
}
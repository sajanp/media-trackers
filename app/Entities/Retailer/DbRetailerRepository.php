<?php namespace App\Entities\Retailer;

use App\Entities\Retailer\EloquentRetailer as Retailer;
use Illuminate\Support\Collection;

class DbRetailerRepository implements RetailerInterface {

	public function create(array $properties)
	{
		if (Retailer::create($properties))
		{
			return true;
		}

		return false;
	}

	public function all(array $with = array())
	{
		return new Collection(json_decode(Retailer::all()->toJson()));
	}
}
<?php namespace App\Entities\Format;

use App\Entities\Format\EloquentFormat as Format;

class DbFormatRepository implements FormatInterface {

	public function allOwnable()
	{
		return Format::ownable()->get();
	}
}
<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Entities\Format\EloquentFormat as Format;

class FormatsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		Format::firstOrCreate([
			'id' => 1,
			'name' => 'BluRay',
			'isOwnable' => true,
			'isRentable' => true,
		]);

		Format::firstOrCreate([
			'id' => 2,
			'name' => 'DVD',
			'isOwnable' => true,
			'isRentable' => true,
		]);

		Format::create([
			'id' => 3,
			'name' => 'Digital',
			'isOwnable' => true,
			'isRentable' => true,
		]);

		Format::create([
			'id' => 4,
			'name' => 'Theater',
			'isOwnable' => false,
			'isRentable' => false,
		]);
	}

}

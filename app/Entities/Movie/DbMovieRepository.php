<?php namespace App\Entities\Movie;

use App\Entities\Movie\EloquentMovie as Movie;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Entities\Purchase\PurchaseInterface;

class DbMovieRepository implements MovieInterface {

	private $purchases;

	public function __construct(PurchaseInterface $purchases)
	{
		$this->purchases = $purchases;
	}

	public function fresh()
	{
		return new Movie;
	}

	public function create(array $properties)
	{
		$movie = $this->fresh();

		$movie->title = array_get($properties, 'title');
		$movie->slug = $this->generateSlug($movie->title);

		if ($movie->save())
		{
			return $movie;
		}

		return false;
	}

	public function getById($id)
	{
		return Movie::findOrFail($id);
	}

	public function all(array $with = array())
	{
		return Movie::orderBy('slug')->get();
	}

	public function updateById($id, array $properties)
	{
		$movie = $this->getById($id);

		$movie->title = $properties['title'];
		$movie->slug = $this->generateSlug($movie->title);

		$movie->save();

		return $movie;
	}

	public function deleteById($id)
	{
		$movie = $this->getById($id);
		$movie->delete();

		$this->purchases->deleteEmptyPurchases();
	}

	public function editionsOwned($id)
	{
		$items = \App\Entities\Purchase\EloquentPurchaseable::where(['purchaseable_type' => 'App\Entities\Movie\EloquentMovie', 'purchaseable_id' => $id])->with('format')->get();
		$result = [];

		foreach ($items as $item)
		{
			$result[] = (object) ['edition' => (strlen($item->edition) > 1 ? $item->edition : 'Standard'), 'format' => $item->format];
		}

		return collect($result);
	}

	private function generateSlug($title)
	{
		$slug = Str::slug(trim($title));

		if (starts_with($slug, 'the-'))
		{
		        $slug = substr($slug, 4);
		}
		elseif (starts_with($slug, 'a-'))
		{
		        $slug = substr($slug, 2);
		}
		elseif (starts_with($slug, 'an-'))
		{
			$slug = substr($slug, 3);
		}

		return $slug;
	}
}

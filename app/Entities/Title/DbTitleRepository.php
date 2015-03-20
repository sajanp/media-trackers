<?php namespace App\Entities\Title;

use App\Entities\Title\EloquentTitle as Title;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class DbTitleRepository implements TitleInterface {

	public function fresh()
	{
		return new Title;
	}

	public function create(array $properties)
	{
		$title = $this->fresh();

		$title->title = array_get($properties, 'title');
		$title->isTV = array_get($properties, 'isTV', false);
		$title->slug = $this->generateSlug($title->title);

		if ($title->save())
		{
			return $title;
		}

		return false;
	}

	public function getById($id)
	{
		return Title::findOrFail($id);
	}

	public function getMovieByID($id)
	{
		return Title::movies()->where('id', $id)->first();
	}

	public function getTVByID($id)
	{
		return Title::TV()->where('id', $id)->first();
	}

	public function all(array $with = array())
	{
		return Title::orderBy('slug')->get();
	}

	public function allMovies(array $with = array())
	{
		return Title::movies()->orderBy('slug')->get();
	}

	public function allTV(array $with = array())
	{
		return Title::TV()->orderBy('slug')->get();
	}

	public function updateById($id, array $properties)
	{
		$title = $this->getById($id);

		$title->title = $properties['title'];
		$title->slug = $this->generateSlug($title->title);

		$title->save();

		return $title;
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
<?php namespace App\Http\Controllers\Movie;

use App\Http\Controllers\Controller;
use App\Entities\Movie\MovieInterface;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Ultraviolet\UltravioletInterface;
use App\Entities\Movie\EloquentMovie as Movie;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class MoviePurchaseController extends Controller {

	private $purchases;
	private $movies;

	public function __construct(PurchaseInterface $purchases, MovieInterface $movies)
	{
		$this->purchases = $purchases;
		$this->movies = $movies;
	}

	public function create($movieId)
	{
		return view('movie.purchase.create');
	}

	public function store(UltravioletInterface $ultraviolet, Request $request, $movieId)
	{
		try
		{
			$purchase = $this->purchases->create([
				'closed' => true,
				'retailer_id' => $request->input('retailer_id'),
				'amount' => $request->input('amount'),
				'note' => $request->input('note'),
				'purchased_on' => $request->input('purchased_on')
			]);

			$movie = $this->movies->getById($movieId);

			foreach($request->input('formats', array()) as $format)
			{
				$purchase->movies()->save($movie, ['format_id' => $format, 'edition' => $request->input('edition', '')]);
			}

			if ($request->input('isUltraviolet', false))
			{
				$ultraviolet->create($movie, $purchase, $request->input('edition'));
			}

			return redirect()->route('movie.show', $movie->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

}

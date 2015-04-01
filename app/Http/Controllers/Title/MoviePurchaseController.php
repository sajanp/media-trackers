<?php namespace App\Http\Controllers\Title;

use App\Http\Controllers\Controller;
use App\Entities\Title\TitleInterface;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Ultraviolet\UltravioletInterface;
use App\Entities\Title\EloquentTitle as Title;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class MoviePurchaseController extends Controller {

	private $purchases;
	private $titles;

	public function __construct(PurchaseInterface $purchases, TitleInterface $titles)
	{
		$this->purchases = $purchases;
		$this->titles = $titles;
	}

	public function create($movieId)
	{
		return view('title.movie.purchase.create');
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

			$movie = $this->titles->getMovieById($movieId);

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

<?php namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Purchase\EloquentPurchase as Purchase;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

class PurchaseController extends Controller {

	public function index()
	{
		return view('purchase.index');
	}

	public function create()
	{
		return view('purchase.create');
	}

	public function quickCreate()
	{
		return view('purchase.quick-create');
	}

	public function quickStore()
	{
		
	}

	public function store(PurchaseInterface $purchases, Request $request)
	{
		try
		{
			$purchase = $purchases->create([
				'closed' => $request->input('closed', false),
				'retailer_id' => $request->input('retailer_id'),
				'amount' => $request->input('amount'),
				'note' => $request->input('note'),
				'purchased_on' => $request->input('purchased_on')
			]);

			return redirect()->route('purchase.show', $purchase->id);
		}
		catch(Exception $e)
		{
			dd($e->getMessage());
		}
	}

	public function show($id)
	{
		return view('purchase.show');
	}

	public function close(PurchaseInterface $purchases, $purchase)
	{
		$purchases->closePurchase($purchase);

		return redirect()->route('purchase.show', $purchase);
	}

}

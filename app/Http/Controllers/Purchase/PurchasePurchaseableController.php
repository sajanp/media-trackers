<?php namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Purchase\EloquentPurchase as Purchase;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container;

class PurchasePurchaseableController extends Controller {

	private $request;
	private $purchases;
	private $purchaseables;

	public function __construct(Request $request, PurchaseInterface $purchases, Container $container)
	{
		$this->request = $request;
		$this->purchases = $purchases;

		switch ($this->request->get('purchaseable_type')) {
			case 'title':
				$this->purchaseables = $container->make('App\Entities\Title\TitleInterface');
				break;
		}
	}

	public function store($purchaseId)
	{
		$purchaseable = $this->purchaseables->getById($this->request->input('purchaseable_id'));
		$purchase = $this->purchases->getById($purchaseId);

		$purchase->movies()->save($purchaseable, ['format_id' => $this->request->input('format_id'), 'edition' => $this->request->input('edition')]);

		return redirect()->route('purchase.show', $purchase->id);
	}
}

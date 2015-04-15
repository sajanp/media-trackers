<?php namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use App\Entities\Purchase\PurchaseInterface;
use App\Entities\Ultraviolet\UltravioletInterface;
use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;
use Illuminate\Contracts\Container\Container;

class PurchasePurchaseableController extends Controller {

	private $request;
	private $purchases;
	private $purchaseables;
	private $ultraviolet;

	public function __construct(Request $request, UltravioletInterface $ultraviolet, PurchaseInterface $purchases, Container $container)
	{
		$this->request = $request;
		$this->purchases = $purchases;
		$this->ultraviolet = $ultraviolet;

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

		if ($this->request->input('isUltraviolet'))
		{
			$this->ultraviolet->create($purchaseable, $purchase, $this->request->input('edition'));
		}

		return redirect()->route('purchase.show', $purchase->id);
	}

	public function edit($purchaseId, $purchaseableId)
	{
		return view('purchase.purchaseable.edit');
	}

	public function update($purchaseId, $purchaseableId)
	{
		$purchase = $this->purchases->getById($purchaseId);
		$purchaseable = $this->purchases->getPurchaseableById($purchaseId, $purchaseableId);

		$this->ultraviolet->delete($purchaseableId);

		$purchaseable->edition = $this->request->input('edition');
		$purchaseable->format_id = $this->request->input('format_id');

		$purchaseable->save();


		if ($this->request->input('isUltraviolet'))
		{
			$this->ultraviolet->create($purchaseable->purchaseable, $purchase, $this->request->input('edition'));
		}

		return redirect()->route('purchase.show', $purchaseId);
	}
}

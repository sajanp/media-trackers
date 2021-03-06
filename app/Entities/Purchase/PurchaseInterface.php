<?php namespace App\Entities\Purchase;

interface PurchaseInterface {

	public function fresh();
	public function create(array $properties);
	public function getOpen();
	public function getById($id, array $with);
	public function getPurchaseableById($purchaseId, $purchaseableId);
	public function closePurchase($id);
	public function openPurchase($id);
	public function deleteEmptyPurchases();
	public function delete($id);
	public function getAll();
}
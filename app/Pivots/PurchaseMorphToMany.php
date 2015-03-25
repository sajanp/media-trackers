<?php namespace App\Pivots;

class PurchaseMorphToMany extends \Illuminate\Database\Eloquent\Relations\MorphToMany {

	public function newPivot(array $attributes = array(), $exists = false)
	{
		$pivot = new PurchasePurchaseable($this->parent, $attributes, $this->table, $exists);

		$pivot->setPivotKeys($this->foreignKey, $this->otherKey)
			  ->setMorphType($this->morphType)
			  ->setMorphClass($this->morphClass);

		return $pivot;
	}

}

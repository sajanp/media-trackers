<?php namespace App\Entities\Purchase;

use Illuminate\Database\Eloquent\Model;
use App\Pivots\PurchasePurchaseable;
use App\Pivots\PurchaseMorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class EloquentPurchase extends Model {

	protected $table = 'purchases';
	protected $guarded = ['id', 'updated_at', 'created_at'];

	public function retailer()
	{
		return $this->belongsTo('App\Entities\Retailer\EloquentRetailer');
	}

	public function getAmountAttribute($value)
	{
		return number_format($value / 100, 2);
	}

	public function movies()
	{
		return $this->morphedByMany('App\Entities\Title\EloquentTitle', 'purchaseable', 'purchaseables', 'purchase_id')->withPivot('format_id', 'edition');
	}

	public function getDates()
	{
		return ['created_at', 'updated_at', 'purchased_on'];
	}

	public function scopeOpen($query)
	{
		return $query->where('closed', false);
	}

	public function morphToMany($related, $name, $table = null, $foreignKey = null, $otherKey = null, $inverse = false)
	{
		$caller = $this->getBelongsToManyCaller();

		// First, we will need to determine the foreign key and "other key" for the
		// relationship. Once we have determined the keys we will make the query
		// instances, as well as the relationship instances we need for these.
		$foreignKey = $foreignKey ?: $name.'_id';

		$instance = new $related;

		$otherKey = $otherKey ?: $instance->getForeignKey();

		// Now we're ready to create a new query builder for this related model and
		// the relationship instances for this relation. This relations will set
		// appropriate query constraints then entirely manages the hydrations.
		$query = $instance->newQuery();

		$table = $table ?: str_plural($name);

		if ($name == 'purchaseable')
		{
			return new PurchaseMorphToMany(
				$query, $this, $name, $table, $foreignKey,
				$otherKey, $caller, $inverse
			);
		}

		return new MorphToMany(
			$query, $this, $name, $table, $foreignKey,
			$otherKey, $caller, $inverse
		);
	}

	public function ultraviolet()
	{
		return $this->morphMany('App\Entities\Ultraviolet\EloquentUltraviolet');
	}
}
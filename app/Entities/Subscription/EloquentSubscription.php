<?php namespace App\Entities\Subscription;

use Illuminate\Database\Eloquent\Model;

class EloquentSubscription extends Model {

	protected $table = 'subscriptions';
	protected $guarded = ['id', 'updated_at', 'created_at'];
}
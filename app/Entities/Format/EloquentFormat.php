<?php namespace App\Entities\Format;

use Illuminate\Database\Eloquent\Model;

class EloquentFormat extends Model {

	protected $table = 'formats';
	protected $guarded = ['id', 'updated_at', 'created_at'];
}
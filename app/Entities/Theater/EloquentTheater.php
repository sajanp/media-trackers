<?php namespace App\Entities\Theater;

use Illuminate\Database\Eloquent\Model;

class EloquentTheater extends Model {

	protected $table = 'theaters';
	protected $guarded = ['id', 'updated_at', 'created_at'];
}
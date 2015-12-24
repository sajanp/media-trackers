<?php
/**
 * Created by PhpStorm.
 * User: sajan
 * Date: 12/23/15
 * Time: 4:27 PM
 */

namespace app\Entities\Rental;

use Illuminate\Database\Eloquent\Model;

class EloquentRental extends Model
{

    protected $table = 'rentals';
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function retailer()
    {
        return $this->belongsTo('App\Entities\Retailer\EloquentRetailer');
    }

    public function format()
    {
        return $this->belongsTo('App\Entities\Format\EloquentFormat');
    }

    public function getDates()
    {
        return ['created_at', 'updated_at', 'rented_on', 'expires_on'];
    }

    public function getPriceAttribute($value)
    {
        return number_format($value / 100, 2);
    }

}
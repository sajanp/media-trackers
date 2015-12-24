<?php

namespace app\Entities\Rental;

use App\Entities\Rental\EloquentRental as Rental;

class DbRentalRepository implements RentalInterface
{
    public function fresh()
    {
        return new Rental;
    }

    public function create(array $properties)
    {
        $rental = $this->fresh();
        $rental->retailer_id = array_get($properties, 'retailer_id');
        $rental->format_id = array_get($properties, 'format_id');
        $rental->price = array_get($properties, 'price') * 100;
        $rental->stillRented = array_get($properties, 'stillRented', true);
        $rental->rented_on = array_get($properties, 'rented_on');
        $rental->expires_on = array_get($properties, 'expires_on');
        $rental->closed = false;

        if ($rental->save())
        {
            return $rental;
        }

        return false;
    }

    public function getAll(array $with = array())
    {
        $rentals = Rental::with($with)->orderBy('rented_on', 'desc')->get();

        return $rentals;
    }
}
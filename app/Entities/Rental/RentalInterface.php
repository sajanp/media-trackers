<?php namespace App\Entities\Rental;

interface RentalInterface {

    public function fresh();
    public function create(array $properties);
    public function getAll(array $with);
}
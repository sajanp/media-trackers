<?php namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use App\Entities\Rental\EloquentRental as Rental;
use App\Entities\Rental\RentalInterface;
use Illuminate\Http\Request;
use Illuminate\Contracts\Support\MessageBag;

class RentalController extends Controller {

    public function index()
    {
        return view('rental.index');
    }

    public function create()
    {
        return view('rental.create');
    }

    public function store(RentalInterface $rentals, Request $request)
    {
        $rental = $rentals->create([
            'retailer_id' => $request->input('retailer_id'),
            'format_id' => $request->input('format_id'),
            'price' => $request->input('price'),
            'rented_on' => $request->input('rented_on'),
            'expires_on' => $request->input('expires_on')
        ]);

        if ($rental)
        {
            return redirect()->route('rental.index');
        }

        dd($rental);
    }

    public function open()
    {

    }

    public function close()
    {

    }
}
<?php namespace App\Http\ViewComposers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use App\Entities\Retailer\RetailerInterface;
use App\Entities\Format\FormatInterface;
use App\Entities\Rental\RentalInterface;
use Illuminate\Routing\Router;

class RentalViewComposer
{

    private $request;
    private $retailers;
    private $router;
    private $formats;
    private $rentals;

    public function __construct(RentalInterface $rentals, Request $request, RetailerInterface $retailers, Router $router, FormatInterface $formats)
    {
        $this->request = $request;
        $this->retailers = $retailers;
        $this->router = $router;
        $this->formats = $formats;
        $this->rentals = $rentals;
    }

    public function index(View $view)
    {
        $view->with('rentals', $this->rentals->getAll(['retailer', 'format']));
    }

    public function modelForm(View $view)
    {
        if (in_array('create', $this->request->segments()))
        {
            $data = [
                'rental' => $this->rentals->fresh(),
                'formDestination' => 'rental.store',
                'formMethod' => 'post',
                'formSubmit' => 'New Rental'
            ];
        }
        elseif (in_array('edit', $this->request->segments()))
        {
            $data = [
                'rental' => $this->rentals->getById($this->router->input('rental')),
                'formDestination' => ['rental.update', $this->router->input('rental')],
                'formMethod' => 'put',
                'formSubmit' => 'Update Rental'
            ];
        }

        $data['retailers'] = $this->retailers->allRentable()->lists('name', 'id')->all();
        $data['formats'] = $this->formats->allOwnable()->lists('name', 'id')->all();

        $view->with($data);
    }
}
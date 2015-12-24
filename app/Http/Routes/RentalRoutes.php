<?php
Route::put('rental/{rental}/close', ['as' => 'rental.close', 'uses' => 'Rental\RentalController@close']);
Route::put('rental/{rental}/open', ['as' => 'rental.open', 'uses' => 'Rental\RentalController@open']);
Route::resource('rental', 'Rental\RentalController');
<?php

Route::resource('movie.purchase', 'Movie\MoviePurchaseController', ['only' => ['create', 'store']]);

Route::get('movie/multi-create', ['as' => 'movie.multi-create', 'uses' => 'Movie\MovieController@multiCreate']);
Route::post('movie/multi-store', ['as' => 'movie.multi-store', 'uses' => 'Movie\MovieController@multiStore']);
Route::resource('movie', 'Movie\MovieController');

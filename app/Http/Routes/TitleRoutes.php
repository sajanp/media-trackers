<?php

Route::get('title/multi-create', ['as' => 'title.multi-create', 'uses' => 'Title\TitleController@multiCreate']);
Route::post('title/multi-store', ['as' => 'title.multi-store', 'uses' => 'Title\TitleController@multiStore']);
Route::resource('title', 'Title\TitleController', ['only' => ['create', 'store', 'edit', 'update']]);
Route::resource('movie', 'Title\MovieController', ['only' => ['show', 'index']]);
Route::resource('tv', 'Title\TVController', ['only' => ['show', 'index']]);
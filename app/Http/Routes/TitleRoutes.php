<?php

Route::resource('title', 'Title\TitleController', ['only' => ['create', 'store', 'edit', 'update']]);
Route::resource('movie', 'Title\MovieController', ['only' => ['show', 'index']]);
Route::resource('tv', 'Title\TVController', ['only' => ['show', 'index']]);
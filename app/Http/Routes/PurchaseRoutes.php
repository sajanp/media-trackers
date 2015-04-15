<?php
Route::put('purchase/{purchase}/close', ['as' => 'purchase.close', 'uses' => 'Purchase\PurchaseController@close']);
Route::put('purchase/{purchase}/open', ['as' => 'purchase.open', 'uses' => 'Purchase\PurchaseController@open']);
Route::resource('purchase', 'Purchase\PurchaseController');
Route::resource('purchase.purchaseable', 'Purchase\PurchasePurchaseableController');
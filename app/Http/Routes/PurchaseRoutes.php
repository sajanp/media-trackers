<?php
Route::put('purchase/{purchase}/close', ['as' => 'purchase.close', 'uses' => 'Purchase\PurchaseController@close']);
Route::resource('purchase', 'Purchase\PurchaseController');
Route::resource('purchase.purchaseable', 'Purchase\PurchasePurchaseableController', ['only' => 'store']);
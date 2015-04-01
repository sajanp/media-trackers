<?php
Route::get('purchase/quick-create', ['as' => 'purchase.quick-create', 'uses' => 'Purchase\PurchaseController@quickCreate']);
Route::post('purchase/quick-store', ['as' => 'purchase.quick-store', 'uses' => 'Purchase\PurchaseController@quickStore']);
Route::put('purchase/{purchase}/close', ['as' => 'purchase.close', 'uses' => 'Purchase\PurchaseController@close']);
Route::resource('purchase', 'Purchase\PurchaseController');
Route::resource('purchase.purchaseable', 'Purchase\PurchasePurchaseableController', ['only' => 'store']);
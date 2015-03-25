<?php

Route::resource('purchase', 'Purchase\PurchaseController');
Route::resource('purchase.purchaseable', 'Purchase\PurchasePurchaseableController', ['only' => 'store']);
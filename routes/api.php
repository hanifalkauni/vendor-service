<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\VendorCategoryController;

// Vendor routes
Route::group(['middleware' => 'auth.vendor'], function () {
    Route::post('vendors', [VendorController::class, 'registerVendor']);
    Route::get('vendors', [VendorController::class, 'listVendors']);
    Route::post('categories', [VendorCategoryController::class, 'createCategory']);
    Route::get('categories', [VendorCategoryController::class, 'listCategories']);
});

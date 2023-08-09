<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AmrodStockController;
use App\Http\Controllers\BearerTokenController;
use App\Http\Controllers\AmrodProductsWithoutBrandingController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('get-token/{customer_id}/{integration_type_id}',[BearerTokenController::class,'getBearerToken']);


Route::controller(AmrodProductsWithoutBrandingController::class)->group(function() {
    Route::get('/store-amrod-products-without-branding/{customer_id}/{integration_type_id}', 'storeProductsWithoutBranding');
    Route::get('/store-amrod-products-with-branding/{customer_id}/{integration_type_id}', 'storeProductsWithBranding');
});


Route::get('/store-amrod-stock/{customer_id}/{integration_type_id}',[AmrodStockController::class, 'storeStock']);
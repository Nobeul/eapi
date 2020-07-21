<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// This route is to access authenticated user
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// This route is to get all products
Route::apiResource('/products', 'ProductController');
// These routes have a prefix of 'products'
Route::group(['prefix' => 'products'], function () {
    // This route is responsible to get all reviews for a single product
    Route::apiResource('/{product}/reviews', 'ReviewController');
});




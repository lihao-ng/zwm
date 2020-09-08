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

Route::middleware('passport.client.auth')->group(function () {
  Route::post('login', 'Api\AuthController@login');
  Route::post('register', 'Api\AuthController@register');	

  Route::middleware('auth:api')->group(function () {
    Route::get('access-token', 'Api\AuthController@accessToken');
    Route::get('logout', 'Api\AuthController@logout');
    
    // ROUTES FOR MERCHANTS
    
    Route::post('merchants/nearby', 'Api\MerchantsController@nearby');
    Route::post('merchants', 'Api\MerchantsController@index');
    Route::get('merchants/{merchant}', 'Api\MerchantsController@show');

    // ROUTES FOR OFFERS

    Route::get('offers', 'Api\OffersController@index');
    Route::get('offers/{offer}', 'Api\OffersController@show');

    // ROUTES FOR PROMO CODES

    Route::post('promocode/redeem', 'Api\PromoCodesController@redeem');

    // ROUTES FOR GUIDES

    Route::get('guides', 'Api\GuidesController@index');
    Route::get('guides/{guide}', 'Api\GuidesController@show');
  });
});

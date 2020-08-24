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
  Route::post('register', 'Api\AuthController@register');	
  Route::post('login', 'Api\AuthController@login');

  Route::middleware(['auth:api'])->group(function () {
    Route::get('access-token', 'Api\AuthController@accessToken');
    Route::get('logout', 'Api\AuthController@logout');

    // ROUTES FOR MERCHANTS

    Route::get('merchants', 'Api\MerchantsController@index');
    Route::get('merchants/{merchant}', 'Api\MerchantsController@show');
  });
});

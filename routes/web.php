<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Routes for Admin

Route::prefix('admin')->name('admin.')->group(function(){
  Route::middleware('guest')->group(function(){
  	Route::get('login', 'Admin\AuthController@showLogin')->name('login.show');
  	Route::post('login', 'Admin\AuthController@login')->name('login.post');
    Route::get('/', 'Admin\AuthController@showLogin');
  });

  Route::middleware('check.auth:admin')->group(function(){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    // Route::get('profile', 'Admin\ProfileController@profile')->name('admin.profile');
    // Route::post('profile', 'Admin\ProfileController@update')->name('admin.profile.update');
  	// Route::put('profile', 'Admin\ProfileController@changePassword')->name('admin.profile.password');

    Route::resource('guides', 'Admin\GuidesController');
        
    Route::post('merchants/import', 'Admin\MerchantsController@import')->name('merchants.import');
    Route::resource('merchants', 'Admin\MerchantsController');
    
    Route::resource('users', 'Admin\UsersController');

    Route::get('logout', 'Admin\AuthController@logout')->name('logout');
  });
});

// Routes for Merchants

Route::middleware('guest')->group(function(){
  Route::get('login', 'Client\AuthController@showLogin')->name('login.show');
  Route::post('login', 'Client\AuthController@login')->name('login');
  Route::get('/', 'Client\AuthController@showLogin');

  Route::get('register', 'Client\AuthController@showRegister')->name('register.show');
  Route::post('register', 'Client\AuthController@register')->name('register');
});

// Route::get('forgotpassword', 'Client\AuthController@forgotPassword')->name('forgot-pw');
// Route::post('forgotpassword/token', 'Client\AuthController@passwordToken')->name('pw-store');
// Route::get('resetpassword/{verficationToken}', 'Client\AuthController@resetPassword')->name('reset-pw');
// Route::put('resetpassword/{id}/edit', 'Client\AuthController@reset')->name('reset');

Route::middleware('check.auth:merchant')->group(function(){
  Route::get('dashboard', 'Client\DashboardController@index')->name('dashboard');

  Route::resource('accepting-items', 'Client\AcceptingItemsController')->parameters(['accepting_item' => 'acceptingItem']);

  Route::resource('offers', 'Client\OffersController');

  Route::resource('award-points', 'Client\AwardPointsController')->only(['index', 'store']);

  Route::get('redemption', 'Client\PromoCodesController@showRedemption')->name('promo-codes.redemption.show');
  Route::post('redemption', 'Client\PromoCodesController@redemption')->name('promo-codes.redemption');
  Route::get('promo-codes/generate', 'Client\PromoCodesController@showGenerate')->name('promo-codes.generate.show');
  Route::post('promo-codes/generate', 'Client\PromoCodesController@generate')->name('promo-codes.generate');
  Route::resource('promo-codes', 'Client\PromoCodesController');

  Route::get('logout', 'Client\AuthController@logout')->name('logout');
});
